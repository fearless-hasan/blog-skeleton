<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Post;
use App\Tag;
use View;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\BootstrapFourPresenter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        

        Schema::defaultStringLength(191);

        View::composer('posts.*', function ($view) {
            $view->with('archives', 
                Post::archives());
        });

        View::composer('posts.*', function ($view) {
            $view->with('tags', 
                Tag::all());
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
