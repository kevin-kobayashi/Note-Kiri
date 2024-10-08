<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\SharedLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SharedLinkController extends Controller
{
    // [Route('/articles/{article}/share', name="articles.share")]
    public function generateShareURL(Article $article)
    {
        // 既存の共有リンクがある場合はそれを使用する
        $sharedLink = $article->shared_link;
        if ($sharedLink) {
            $shareURL = $sharedLink->url;
            return redirect($shareURL);
        } else {
            // 署名つきURLを生成
            // $shareURL = URL::temporarySignedRoute('shared.show', now()->addHours(12), ['id' => $article->id]);
            $shareURL = URL::signedRoute('shared.show', $article);

            // 共有リンクを保存
            $sharedLink = new SharedLink();
            $sharedLink->url = $shareURL;
            $article->shared_link()->save($sharedLink);
    
            return redirect($shareURL);
        }
    }

    // 共有リンクを表示するメソッド
    // [Route('/shared-articles/{article}', name="shared.show")]
    public function showShared(Article $article)
    {
        if (!$article->shared_link) {
            return view('errors.404');
        }else{
            // 共有リンクを取得（リレーションを利用）
            $sharedLink = $article->shared_link->url;
        }
        return view('shared_links.show', compact('article', 'sharedLink'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // [Route('shared-articles/', name="shared.index")]
    public function getSharedLinks()
    {
        $user = auth()->user(); // ログインユーザーの情報を取得

        // ログインユーザーが共有リンクを持つ記事の情報を取得
        $articles = $user->articles()
            ->join('shared_links', 'articles.id', '=', 'shared_links.article_id')
            ->select('articles.id', 'articles.title', 'shared_links.created_at as shared_link_created_at')
            ->orderByDesc('shared_link_created_at')
            ->get();
        return view('shared_links.index', compact('articles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // [Route('/shared-articles/{article}/delete', name="shared.delete")]
    public function delete(Article $article)
    {
        $article->shared_link->delete();
        return redirect()->route('shared.index');
    }

    // [Route('/shared-articles/removeAll', name="shared.removeAll")]
    public function removeAll()
    {
        $user = Auth::user();
        foreach ($user->articles as $article) {
            $article->shared_link()->delete();
        }
        return redirect()->route('shared.index');
    }
}
