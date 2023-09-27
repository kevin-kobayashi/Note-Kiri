<?php
use App\Http\Controllers\SharedLinkController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\Auth\VerificationController;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\UserController;

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

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes(['verify' => true]);
});


Route::get('/', function () {
    return view('intro');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


// メールの認証期限(この)が
Route::get('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth'])
    ->name('verification.resend');
// メール認証前のアカウントの削除
Route::post('/email/verify/delete', [UserController::class, 'authDelete'])
    ->middleware(['auth'])
    ->name('verification.delete');

    
Route::middleware(['auth', 'verified'])->group(function () {

    //サイドバーに表示されている記事を一括で削除する
    Route::delete('/articles/removeAll', [ArticleController::class, 'removeAll'])
        ->name('articles.removeAll');
    
    Route::resource('articles', ArticleController::class);

    // 共有リンクを生成するURL（POSTリクエスト）
    Route::post('/articles/{article}/share', [SharedLinkController::class, 'generateShareURL'])
        ->name('articles.share');

    // 共有リンク一覧を表示するページ
    Route::get('/shared-articles', [SharedLinkController::class, 'getSharedLinks'])
        ->name('shared.index');

    // 共有リンク一覧を一括削除
    Route::delete('/shared-articles/removeAll', [SharedLinkController::class, 'removeAll'])
        ->name('shared.removeAll');
        
    //  共有リンクの個別削除ルート
    Route::delete('/shared-articles/{article}/delete', [SharedLinkController::class, 'delete'])
        ->name('shared.delete');
    
    // アカウントの論理削除
    Route::post('/delete-account', [UserController::class, 'delete'])
        ->name('delete-account');
});


// 共有リンクを表示する新しいページ
Route::get('/shared-articles/{article}', [SharedLinkController::class, 'showShared'])
    ->name('shared.show')
    ->middleware('signed');


Route::get('/terms', function () {
    return view('legal-docs.Terms_of_Use');
})->name('terms');

Route::get('/privacy-terms', function () {
    return view('legal-docs.privacy');
})->name('privacy-terms');
