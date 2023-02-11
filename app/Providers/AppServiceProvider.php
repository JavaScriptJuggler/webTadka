<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
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
        if (Request::is('get-subscribers'))
            Paginator::useBootstrap();
        else
            Paginator::defaultView('frontend.pages.blogs.pagination');

        // Paginator::defaultSimpleView('frontend.pages.blogs.pagination');
    }
}
