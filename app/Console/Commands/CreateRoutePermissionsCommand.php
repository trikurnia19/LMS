<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class CreateRoutePermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-permission-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a permission routes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $routes = Route::getRoutes()->getRoutes();
        $controllersPath = 'App\Http\Controllers';
        $role = Role::findByName('admin');
        foreach ($routes as $route) {
            $type = gettype($route->getAction()['uses']);
            if ($type != 'object' && $type === 'string' && str_contains($route->getAction()['uses'], $controllersPath)) {
                $actionName = explode('@', basename(str_replace('\\', '/', $route->getAction()['uses'])));
                $moduleName = preg_replace('/Controller$/', '', $actionName[0]);
                if ($moduleName != 'Auth' && $moduleName != 'PasswordManagement') {
                    $methodName = $actionName[1];
                    $permName = "$moduleName@$methodName";
                    $permission = ModelsPermission::where('name', $permName)->where('module', $moduleName)->first();
                    if (empty($permission)) {
                        $permission = ModelsPermission::create([
                            'name' => $permName,
                            'guard' => 'api',
                            'module' => $moduleName,
                        ]);
                    }
                    // $role->givePermissionTo($permission);
                }
            }
        }

        $permissions = ModelsPermission::all();
        $role->syncPermissions($permissions);
        $this->info("Sync permissions into admin success.");
    }
}