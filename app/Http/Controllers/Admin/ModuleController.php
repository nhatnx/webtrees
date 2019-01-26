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

namespace Fisharebest\Webtrees\Http\Controllers\Admin;

use Fisharebest\Webtrees\FlashMessages;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module;
use Fisharebest\Webtrees\Module\ModuleBlockInterface;
use Fisharebest\Webtrees\Module\ModuleChartInterface;
use Fisharebest\Webtrees\Module\ModuleInterface;
use Fisharebest\Webtrees\Module\ModuleMenuInterface;
use Fisharebest\Webtrees\Module\ModuleReportInterface;
use Fisharebest\Webtrees\Module\ModuleSidebarInterface;
use Fisharebest\Webtrees\Module\ModuleTabInterface;
use Fisharebest\Webtrees\Tree;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller for configuring the modules.
 */
class ModuleController extends AbstractAdminController
{
    /**
     * Show the administrator a list of modules.
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->viewResponse('admin/modules', [
            'title'             => I18N::translate('Module administration'),
            'modules'           => Module::all(),
            'deleted_modules'   => $this->deletedModuleNames(),
        ]);
    }

    /**
     * Generate a list of module names which exist in the database but not on disk.
     *
     * @return Collection|string[]
     */
    public function deletedModuleNames(): Collection
    {
        $database_modules = DB::table('module')->pluck('module_name');

        $disk_modules = Module::all()
            ->map(function (ModuleInterface $module): string {
                return $module->name();
            });

        return $database_modules->diff($disk_modules);
    }

    /**
     * @return Response
     */
    public function listBlocks(): Response
    {
        return $this->listComponents(ModuleBlockInterface::class, 'block', I18N::translate('Blocks'));
    }

    /**
     * @return Response
     */
    public function listCharts(): Response
    {
        return $this->listComponents(ModuleChartInterface::class, 'chart', I18N::translate('Charts'));
    }

    /**
     * @return Response
     */
    public function listMenus(): Response
    {
        return $this->listComponents(ModuleMenuInterface::class, 'menu', I18N::translate('Menus'));
    }

    /**
     * @return Response
     */
    public function listReports(): Response
    {
        return $this->listComponents(ModuleReportInterface::class, 'report', I18N::translate('Reports'));
    }

    /**
     * @return Response
     */
    public function listSidebars(): Response
    {
        return $this->listComponents(ModuleSidebarInterface::class, 'sidebar', I18N::translate('Sidebars'));
    }

    /**
     * @return Response
     */
    public function listTabs(): Response
    {
        return $this->listComponents(ModuleTabInterface::class, 'tab', I18N::translate('Tabs'));
    }

    /**
     * @param string $interface
     * @param string $component
     * @param string $title
     *
     * @return Response
     */
    private function listComponents(string $interface, string $component, string $title): Response
    {
        return $this->viewResponse('admin/components', [
            'component' => $component,
            'modules'   => Module::findByInterface($interface, true),
            'title'     => $title,
            'trees'     => Tree::all(),
        ]);
    }

    /**
     * Update the enabled/disabled status of the modules.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $modules = Module::all();

        foreach ($modules as $module) {
            $new_status = (bool) $request->get('status-' . $module->name());
            $old_status = $module->isEnabled();

            if ($new_status !== $old_status) {
                DB::table('module')
                    ->where('module_name', '=', $module->name())
                    ->update(['status' => $new_status ? 'enabled' : 'disabled']);

                if ($new_status) {
                    FlashMessages::addMessage(I18N::translate('The module “%s” has been enabled.', $module->title()), 'success');
                } else {
                    FlashMessages::addMessage(I18N::translate('The module “%s” has been disabled.', $module->title()), 'success');
                }
            }
        }

        return new RedirectResponse(route('modules'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateBlocks(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleBlockInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateAccessLevel($modules, 'block', $request);

        return new RedirectResponse(route('blocks'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateCharts(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleChartInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateAccessLevel($modules, 'chart', $request);

        return new RedirectResponse(route('charts'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateMenus(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleMenuInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateOrder($modules, 'menu_order', $request);
        $this->updateAccessLevel($modules, 'menu', $request);

        return new RedirectResponse(route('menus'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateReports(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleReportInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateAccessLevel($modules, 'report', $request);

        return new RedirectResponse(route('reports'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateSidebars(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleSidebarInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateOrder($modules, 'sidebar_order', $request);
        $this->updateAccessLevel($modules, 'sidebar', $request);

        return new RedirectResponse(route('sidebars'));
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function updateTabs(Request $request): RedirectResponse
    {
        $modules = Module::findByInterface(ModuleTabInterface::class, true);

        $this->updateStatus($modules, $request);
        $this->updateOrder($modules, 'tab_order', $request);
        $this->updateAccessLevel($modules, 'tab', $request);

        return new RedirectResponse(route('tabs'));
    }

    /**
     * Update the access levels of the modules.
     *
     * @param Collection $modules
     * @param string     $column
     * @param Request    $request
     *
     * @return void
     */
    private function updateOrder(Collection $modules, string $column, Request $request): void
    {
        $order = (array) $request->get('order');
        $order = array_flip($order);

        foreach ($modules as $module) {
            DB::table('module')
                ->where('module_name', '=', $module->name())
                ->update([
                    $column => $order[$module->name()] ?? 0
                ]);
        }
    }

    /**
     * Update the access levels of the modules.
     *
     * @param Collection $modules
     * @param Request    $request
     *
     * @return void
     */
    private function updateStatus(Collection $modules, Request $request): void
    {
        foreach ($modules as $module) {
            $enabled = (bool) $request->get('status-' . $module->name());

            if ($enabled !== $module->isEnabled()) {
                DB::table('module')
                    ->where('module_name', '=', $module->name())
                    ->update(['status' => $enabled ? 'enabled' : 'disabled']);

                if ($enabled) {
                    $message = I18N::translate('The module “%s” has been enabled.', $module->title());
                } else {
                    $message = I18N::translate('The module “%s” has been disabled.', $module->title());
                }

                FlashMessages::addMessage($message, 'success');
            }
        }
    }

    /**
     * Update the access levels of the modules.
     *
     * @param Collection $modules
     * @param string     $component
     * @param Request    $request
     *
     * @return void
     */
    private function updateAccessLevel(Collection $modules, string $component, Request $request): void
    {
        $trees = Tree::all();

        foreach ($modules as $module) {
            foreach ($trees as $tree) {
                $key          = 'access-' . $module->name() . '-' . $tree->id();
                $access_level = (int) $request->get($key);

                if ($access_level !== $module->accessLevel($tree, $component)) {
                    DB::table('module_privacy')->updateOrInsert([
                        'module_name' => $module->name(),
                        'gedcom_id'   => $tree->id(),
                        'component'   => $component,
                    ], [
                        'access_level' => $access_level,
                    ]);
                }
            }
        }
    }

    /**
     * Delete the database settings for a deleted module.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function deleteModuleSettings(Request $request): RedirectResponse
    {
        $module_name = $request->get('module_name');

        DB::table('block_setting')
            ->join('block', 'block_setting.block_id', '=', 'block.block_id')
            ->join('module', 'block.module_name', '=', 'module.module_name')
            ->where('module.module_name', '=', $module_name)
            ->delete();

        DB::table('block')
            ->join('module', 'block.module_name', '=', 'module.module_name')
            ->where('module.module_name', '=', $module_name)
            ->delete();

        DB::table('module_setting')
            ->where('module_name', '=', $module_name)
            ->delete();

        DB::table('module_privacy')
            ->where('module_name', '=', $module_name)
            ->delete();

        DB::table('module')
            ->where('module_name', '=', $module_name)
            ->delete();

        FlashMessages::addMessage(I18N::translate('The preferences for the module “%s” have been deleted.', $module_name), 'success');

        return new RedirectResponse(route('modules'));
    }
}