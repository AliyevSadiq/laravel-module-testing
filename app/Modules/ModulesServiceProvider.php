<?php
namespace App\Modules;

use App\Models\Module;

class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider {
    public function boot() {

        $modules=Module::select('module_name')->get()->toArray();
        if($modules) {

                foreach ($modules as $module){
                    if(file_exists(__DIR__.'/'.$module['module_name'].'/routes')) {
                        $this->loadRoutesFrom(__DIR__.'/'.$module['module_name'].'/routes/web.php');
                    }

                    if(is_dir(__DIR__.'/'.$module['module_name'].'/resources/views')) {
                    $this->loadViewsFrom(__DIR__.'/'.$module['module_name'].'/resources/views', $module['module_name']);
                    }

                    if(is_dir(__DIR__.'/'.$module['module_name'].'/database/migrations')) {
                        $this->loadMigrationsFrom(__DIR__.'/'.$module['module_name'].'/database/migrations');
                    }

                    if(is_dir(__DIR__.'/'.$module['module_name'].'/Lang')) {
                        $this->loadTranslationsFrom(__DIR__.'/'.$module['module_name'].'/Lang', $module['module_name']);
                    }


            }
       }
    }

    public function register()
    {

    }
}
