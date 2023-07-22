<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use App\Models\Article;
use App\Models\SharedLink;
use Illuminate\Http\Request;

class SharedLinkController extends Controller
{
    public function generateShareURL($id)
    {
        $article = Article::findOrFail($id);
    
        // 既存の共有リンクがある場合はそれを使用する
        $sharedLink = $article->shared_link;
        if ($sharedLink) {
            $shareURL = $sharedLink->shared_link;
            return redirect($shareURL);
        } else {
            // 署名つきURLを生成
            $shareURL = URL::temporarySignedRoute('shared.show', now()->addHours(24), ['id' => $article->id]);
    
            // 共有リンクを保存
            $sharedLink = new SharedLink();
            $sharedLink->shared_link = $shareURL;
            $article->shared_link()->save($sharedLink);
    
            return redirect()->route('shared.show', ['id' => $article->id]);
        }
    }

    // 共有リンクを表示するメソッド
    public function showShared($id)
    {
        $article = Article::findOrFail($id);

        // 共有リンクを取得（リレーションを利用）
        $sharedLink = $article->shared_link->shared_link;

        return view('shared_links.show', compact('article', 'sharedLink'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     *
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Http\Response
     */
    public function show(SharedLink $sharedLink)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SharedLink  $sharedLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SharedLink $sharedLink)
    {
        //
    }
}
