<?php
use App\Http\Controllers\SharedLinkController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\Auth\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('intro');
});
// メールの認証期限(この)が
Route::get('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::resource('articles', ArticleController::class)->middleware(['auth', 'verified']);
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 共有リンクを生成するURL
Route::get('/articles/{id}/share', [SharedLinkController::class, 'generateShareURL'])->name('articles.share');

// 共有リンクを表示する新しいページ
Route::get('/shared-articles/{id}', [SharedLinkController::class, 'showShared'])->name('shared.show');