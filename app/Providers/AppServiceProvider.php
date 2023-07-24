<?php

namespace App\Providers;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
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
    //サイドバーの投稿一覧
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view) {
            // 最新の記事を取得して渡す
            $latestArticles = Article::orderBy('updated_at', 'desc')->get();
            $view->with('latestArticles', $latestArticles);

            // ログインしているユーザーの情報を取得してユーザー名を渡す
            if (Auth::check()) {
                $username = Auth::user()->name; // もしくは適切なフィールドを使用
                $view->with('username', $username);
            }
        });
    }
}
