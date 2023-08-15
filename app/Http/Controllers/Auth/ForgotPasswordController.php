<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    /**
     * SendsPasswordResetEmails trait で定義されているメソッドを上書きして
     * メールアドレスが存在しない場合でも error message を表示しない。
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        sleep(3);
        // もともとはこちらの処理
        //return back()
        //        ->withInput($request->only('email'))
        //        ->withErrors(['email' => trans($response)]);
        // レスポンスを成功したときと同様の処理に書き換える。
        $response = 'passwords.sent';
        // 成功時と同じようにバリデーションエラーは出さないで戻す
        return back()->with('status', trans($response));
    }
}
