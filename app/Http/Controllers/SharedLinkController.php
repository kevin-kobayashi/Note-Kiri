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
    public function generateShareURL($id)
    {
        $article = Article::findOrFail($id);
    
        // 既存の共有リンクがある場合はそれを使用する
        $sharedLink = $article->shared_link;
        if ($sharedLink) {
            $shareURL = $sharedLink->url;
            return redirect($shareURL);
        } else {
            // 署名つきURLを生成
            // $shareURL = URL::temporarySignedRoute('shared.show', now()->addHours(12), ['id' => $article->id]);
            $shareURL = URL::signedRoute('shared.show', ['id' => $article->id]);

    
            // 共有リンクを保存
            $sharedLink = new SharedLink();
            $sharedLink->url = $shareURL;
            $article->shared_link()->save($sharedLink);
    
            return redirect($shareURL);
        }
    }

    // 共有リンクを表示するメソッド
    public function showShared($id)
    {
        $article = Article::findOrFail($id);

        // 共有リンクを取得（リレーションを利用）
        $sharedLink = $article->shared_link->url;

        return view('shared_links.show', compact('article', 'sharedLink'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function getSharedLinks()
    // {
    //     $userId = auth()->id(); // ログインユーザーのIDを取得

    //     // ログインユーザーが共有リンクを持つ記事の情報を取得
    //     $articles = Article::join('shared_links', 'articles.id', '=', 'shared_links.article_id')
    //     ->where('articles.user_id', $userId)
    //     ->select('articles.id', 'articles.title', 'shared_links.created_at as shared_link_created_at')
    //     ->orderBy('shared_link_created_at', 'desc')
    //     ->get();

    //     return view('shared_links.index', compact('articles'));
    // }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SharedLink $sharedLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SharedLink $sharedLink)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->shared_link->delete();
        return redirect()->route('shared.index');
    }

    public function removeAll()
    {
        $user = Auth::user();
        foreach ($user->articles as $article) {
            $article->shared_link()->delete();
        }

        return redirect()->route('shared.index');
    }
}
