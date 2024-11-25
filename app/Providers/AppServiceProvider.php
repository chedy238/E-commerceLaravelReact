<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Schema;
use App\Models\Parameter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        Schema::enableForeignKeyConstraints();
        if (!app()->runningInConsole()) {
            View::composer(['layouts_dashb.head','layouts_dashb.aside' ], function($view)
            {
                $info=Parameter::first();
                $view->with('infoormations', $info);
            });
        }
    }
}
