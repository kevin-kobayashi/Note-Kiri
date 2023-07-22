@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">

            <!-- サイドバーのトグルボタン -->
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>

            <div class="mx-auto w-100 p-4">
                <div class="mb-1 border-bottom border-secondary pt-3">
                    <h1 class="fw-bolder">{{ $article->title }}</h1>
                    <div class="d-flex pt-1 align-items-baseline">
                        <div>{{$article->updated_at->format('m d, Y')}}</div>
                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="ms-1"><i class="bi bi-pencil-square"></i></a></span>
                        
                        <a class="ms-auto" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}"><i class="bi fs-1 bi-trash"></i></a>
                    </div>
                </div>
            </div>
            <div class="flax p-4 gap-4 align-baseline m-auto">
                <div class="flex flex-grow flex-col gap-3">
                    <div>{!! nl2br(e($article->content)) !!}</div>
                </div>
            </div>
            <!-- 新規投稿作成ボタン -->
            <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div>
        </main>
    </div>
</div>
@include('modals.delete_article')
@endsection 