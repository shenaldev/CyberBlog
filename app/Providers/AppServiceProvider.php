<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use View;
use App\Setting;

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
        //
        Schema::defaultStringLength(244);

        /**
         *
         * Share Auth User To All Views
         */
        view()->composer('*', function ($view) {
            $view->with('admin',Auth::user());
        });


        /**
         * Get Settings Option And Value Form DB
         * Then Add Key And Value As Array
         */
        $settings = Setting::all();
        $settingsArray = array();

        foreach($settings as $setting){
            $settingsArray[$setting->option] = $setting->value;
        }

        $arrayObj = (object)$settingsArray;

        View::share('settings',$arrayObj);

    }
}
