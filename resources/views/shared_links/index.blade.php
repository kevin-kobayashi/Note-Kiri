@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">

            <!-- サイドバーのトグルボタン -->
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="ms-3 border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>

            <div class="mx-auto w-100 p-4">
                <div class="mb-1 border-bottom border-secondary pt-3">
                    <h1>共有リンク一覧</h1>
                </div>
            </div>
            <div class="flax p-4 gap-4 align-baseline m-auto">
                <ul class="list-group">
                    @foreach ($articles as $article)
                    <li class="list-group-item bg-transparent">
                        <div class="row">
                            <div class="col-md-8">
                                <p>name: <a href="{{ $article->shared_link->shared_link }}" target="_blank">{{ $article->title }}</a></p>
                                <p>Date shared: {{ $article->shared_link->created_at->format('Y-m-d') }}</p>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <a href="{{ route('articles.show', $article->id) }}"><i class="bi bi-chat-left"></i></a>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- 新規投稿作成ボタン -->
            <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div>
        </main>
    </div>
</div>
@endsection 