<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\adds;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//View::share('key', 'value');
        View::composer('*',function($view){
            $model = adds::where([['is_delete',0],['is_active',1],['adds_type',1]])->get(); //or any eloquent method or where clause you to use to fetch the data
            $view->with('addss', $model);
     });
    }
}
