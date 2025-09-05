<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
 

public function boot()
{
    View::composer('layout.frontend.header', function ($view) {
        $view->with('category', Category::all());
    });

      View::composer('layout.frontend.header', function ($view) {
        $view->with('brand', brand::all());
    });

}
}
