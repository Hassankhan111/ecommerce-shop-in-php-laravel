<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\brand;
use App\Models\Option;
use Illuminate\Pagination\Paginator;


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
        View::composer('*', function ($view) {
            $view->with('category', Category::all());
        });

        View::composer('*', function ($view) {
            $view->with('brand', brand::all());
        });

        /* View::composer('*', function ($view) {
            $view->with('options', Option::first());
        });*/

        View::composer('*', function ($view) {
            $view->with('products', Product::first());


        });

        View::composer('*', function ($view) {
            $view->with('sub_cat_products', Product::with('sub_categorie')->get());
        });

        view::composer('*', function ($view) {
            $view->with('seeting_option', Option::first());
        });

        Paginator::useBootstrapFive();

    }
    
}
