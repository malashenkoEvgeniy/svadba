<?php namespace App\Modules;
/** * Сервис провайдер для подключения модулей */
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot() {
        //получаем список модулей, которые надо подгрузить
        $modules = config("modular.modules");
        if($modules) {
            foreach($modules as $module){
                //Подключаем роуты для модуля
                 if(file_exists(__DIR__.'/'.$module.'/Routes/site.php')) {
                     $this->loadRoutesFrom(__DIR__.'/'.$module.'/Routes/site.php');
                }
                if(file_exists(__DIR__.'/'.$module.'/Routes/admin.php')) {
                    $this->loadRoutesFrom(__DIR__.'/'.$module.'/Routes/admin.php');
                }
        //Загружаем View
        //view('Test::admin')
                if(is_dir(__DIR__.'/'.$module.'/views')) {

                $this->loadViewsFrom(__DIR__.'/'.$module.'/views', $module);
                }
    //Подгружаем миграции
                if(is_dir(__DIR__.'/'.$module.'/Migration')) {
                    $this->loadMigrationsFrom(__DIR__.'/'.$module.'/Migration');
                }
    //Подгружаем переводы
    //trans('Test::messages.welcome')
                if(is_dir(__DIR__.'/'.$module.'/Lang')) {
                    $this->loadTranslationsFrom(__DIR__.'/'.$module.'/Lang', $module);
                }
            }
        }
    }

    public function register()
    {

    }
}
