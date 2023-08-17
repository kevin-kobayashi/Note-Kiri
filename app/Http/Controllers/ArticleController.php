<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ArticleController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'max:100', 'string'],
            'content' => ['required', 'string'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // [Route('articles/', name="articles.index")]
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // [Route('/articles/create', name="articles.create")]
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // [Route('articles/', name="articles.store")]
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->user_id = $user->id;
        $article->save();

        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // [Route('/articles/{article}', name="articles.show")]
    public function show(Article $article)
    {
        try {
            $this->authorize('view', $article);
        } catch (AuthorizationException $e ) {
            return view('errors/403');
        }

        // 閲覧が許可された場合の処理
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // [Route('/articles/{article}/edit', name="articles.edit")]
    public function edit(Article $article)
    {
        try {
            $this->authorize('edit', $article);
        } catch (AuthorizationException $e ) {
            return view('errors/403');
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // [Route('/articles/{article}', name="articles.update")]
    public function update(Request $request, Article $article)
    {
        try {
            $this->authorize('update', $article);
        } catch (AuthorizationException $e ) {
            return view('errors/403');
        }

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->save();

        return redirect()->route('articles.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // [Route('/articles/{article}', name="articles.destroy")]
    public function destroy(Article $article)
    {
        try {
            $this->authorize('destroy', $article);
        } catch (AuthorizationException $e ) {
            return view('errors/403');
        }

        $article->delete();
        
        return redirect()->route('articles.index');
    }

    // [Route('/articles/removeAll', name="articles.removeAll")]
    public function removeAll()
    {
        $user = Auth::user();
        $user->articles()->delete();

        $user->articles()->onlyTrashed()
            ->where('deleted_at', '<=', Carbon::now()->subDays(30))
            ->forceDelete();

        return redirect()->route('articles.index');
    }
}
