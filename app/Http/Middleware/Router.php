<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Fisharebest\Webtrees\Http\Middleware;

use Aura\Router\RouterContainer;
use Fisharebest\Webtrees\Services\ModuleService;
use Fisharebest\Webtrees\Services\TreeService;
use Fisharebest\Webtrees\Tree;
use Fisharebest\Webtrees\View;
use Middleland\Dispatcher;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function app;
use function array_map;
use function http_build_query;

use const PHP_QUERY_RFC3986;

/**
 * Simple class to help migrate to a third-party routing library.
 */
class Router implements MiddlewareInterface
{
    /** @var ModuleService */
    private $module_service;

    /** @var RouterContainer */
    private $router_container;

    /** @var TreeService */
    private $tree_service;

    /**
     * Router constructor.
     *
     * @param ModuleService   $module_service
     * @param RouterContainer $router_container
     * @param TreeService     $tree_service
     */
    public function __construct(ModuleService $module_service, RouterContainer $router_container, TreeService $tree_service)
    {
        $this->module_service   = $module_service;
        $this->router_container = $router_container;
        $this->tree_service     = $tree_service;
    }

    /**
     * @param ServerRequestInterface  $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if ((bool) $request->getAttribute('rewrite_urls') === false) {
            // Turn the ugly URL into a pretty one, so the router can parse it.
            // Note that the 'route' parameter contains the full path.
            $uri       = $request->getUri();
            $params    = $request->getQueryParams();
            $url_route = $params['route'] ?? '/';
            $uri       = $uri->withPath($url_route);
            unset($params['route']);
            $uri     = $uri->withQuery(http_build_query($params, '', '&', PHP_QUERY_RFC3986));
            $temp_request = $request->withUri($uri)->withQueryParams($params);
        } else {
            $temp_request = $request;
        }

        // Match the request to a route.
        $route = $this->router_container->getMatcher()->match($temp_request);

        // No route matched?
        if ($route === false) {
            // Bind the request into the container and the layout
            app()->instance(ServerRequestInterface::class, $request);
            View::share('request', $request);

            return $handler->handle($request);
        }

        // Add the route as attribute of the request
        $request = $request->withAttribute('route', $route->name);

        // Firstly, apply the route middleware
        $route_middleware = $route->extras['middleware'] ?? [];
        $route_middleware = array_map('app', $route_middleware);

        // Secondly, apply any module middleware
        $module_middleware = $this->module_service->findByInterface(MiddlewareInterface::class)->all();

        // Finally, run the handler using middleware
        $handler_middleware = [new WrapHandler($route->handler)];

        $middleware = array_merge($route_middleware, $module_middleware, $handler_middleware);

        // Add the matched attributes to the request.
        foreach ($route->attributes as $key => $value) {
            if ($key === 'tree') {
                $value = $this->tree_service->findByName($value);
                // @TODO - this is still required by the date formatter.
                app()->instance(Tree::class, $value);
                // @TODO - this is still required by various view templates.
                View::share('tree', $value);
            }
            $request = $request->withAttribute($key, $value);
        }

        // Bind the request into the container and the layout
        app()->instance(ServerRequestInterface::class, $request);
        View::share('request', $request);

        $dispatcher = new Dispatcher($middleware, app());

        return $dispatcher->dispatch($request);
    }
}
