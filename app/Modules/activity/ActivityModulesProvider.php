<?php
namespace App\Modules\activity;

/**
 * Created by PhpStorm.
 * User: bachnguyen
 * Date: 17/07/2017
 * Time: 15:56
 */
class ActivityServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.activitymodules");

        while (list(,$module) = each($modules)) {

            // Load the routes for each of the modules
            if(file_exists(__DIR__  .'/'.$module.'/routes.php')) {
                include __DIR__  .'/'.$module.'/routes.php';
            }

            // Load the views
            if(is_dir(__DIR__  .'/'.$module.'/Views')) {
                $this->loadViewsFrom(__DIR__  .'/'.$module.'/Views', $module);
            }

            //load migration to create db
            if(is_dir(__DIR__ .'/'.$module.'/Migration')){
                $this->loadMigrationsFrom(__DIR__  .'/'.$module.'/Migration');
            }

        }
    }

    public function register() {}

}