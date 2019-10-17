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

namespace Fisharebest\Webtrees\Http\RequestHandlers;

use Fig\Http\Message\StatusCodeInterface;
use Fisharebest\Webtrees\Auth;
use Fisharebest\Webtrees\Log;
use Fisharebest\Webtrees\Services\UserService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use function response;

/**
 * Delete a user.
 */
class DeleteUser implements RequestHandlerInterface, StatusCodeInterface
{
    /** @var UserService */
    private $user_service;

    /**
     * @param UserService   $user_service
     */
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $user_id = (int) $request->getParsedBody()['user_id'];

        $user = $this->user_service->find($user_id);

        if ($user === null) {
            throw new NotFoundHttpException('User ID ' . $user_id . ' not found');
        }

        if (Auth::isAdmin($user)) {
            throw new AccessDeniedHttpException('Cannot delete an administrator');
        }

        Log::addAuthenticationLog('Deleted user: ' . $user->userName());
        $this->user_service->delete($user);

        return response('', StatusCodeInterface::STATUS_NO_CONTENT);
    }
}
