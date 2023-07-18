<?php

namespace App\Providers;
use App\Models\Article;
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
        view()->composer('layouts.sidebar', function ($view) {
            $latestArticles = Article::orderBy('updated_at', 'desc')->get();
            $view->with('latestArticles', $latestArticles);
        });
    }
}
