@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">

            <!-- サイドバーのトグルボタン -->
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="ms-3 border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>

            <div class="flex p-4 align-baseline gap-6 py-6 m-auto">
                <div class="border border-white p-3">
                    <form action="{{ route('articles.update', $article) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label for="article-title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="article-title" type="text" class="form-control bg-secondary bg-gradient" name="title" value="{{ $article->title }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="article-content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label> -->

                            <div class="flex p-4 gap-4 m-auto">
                                <div class="flex flex-grow flex-col gap-3">
                                    <textarea id="article-content" class="form-control bg-secondary bg-gradient" name="content" rows="15">{{ str_replace('<br>', "\n", $article->content) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 text-start">
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('Submit') }} <i class="bi bi-chat-square-text"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 新規投稿作成ボタン -->
            <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div>
        </main>
    </div>
</div>
@endsection
