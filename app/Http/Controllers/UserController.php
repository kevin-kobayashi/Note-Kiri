<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    // [Route('/email/verify/delete', name="verification.delete")]
    public function authDelete(Request $request)
    {
        $user = $request->user();

        // ユーザーを削除するロジックを追加
        $user->delete();

        return redirect('/'); // 削除後のリダイレクト先を適切に設定
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $user = Auth::user();
        $Confirmation = $request->input('confirmationInput');

        if ($Confirmation === 'DeleteNote-KiriAccount' && !$user->deleted_flag) {
            $user->deleted_flag = true;
            $user->save();

            $user->articles()->onlyTrashed()
            ->where('deleted_at', '<=', Carbon::now()->subDays(30))
            ->forceDelete();
            
            Auth::logout();
            return redirect('/')->with('success', __('Account successfully deleted.'));
        }else{
            return redirect()->back()->with('failure', __('The input was deemed invalid.'));
        } 
    }
}
