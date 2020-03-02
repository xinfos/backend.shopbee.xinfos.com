<?php
 
namespace App\Providers;
use Validator;
use Illuminate\Support\ServiceProvider;
 
class ValidateServiceProvider extends ServiceProvider
{
 
    /**
     * 启动应用服务
     *
     * @return void
     */
    public function boot()
    {
 
        Validator::extend('mobile', function($attribute, $value, $parameters) {
            return preg_match("/^1[34578]{1}\d{9}$/",$value);
        });
      
    }
 
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         
    }
}