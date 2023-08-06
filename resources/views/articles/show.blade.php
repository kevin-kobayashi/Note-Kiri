@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @component('layouts.sidebar')
        @endcomponent
        <main class="ps-md-2 pt-2">
            @component('layouts.header_buttons')
            @endcomponent
            <div class="mx-auto p-1">
                <div class="border-bottom border-secondary pt-3">
                    <div class="d-flex pt-1 align-items-baseline">
                        <div>{{$article->updated_at->format('m d, Y')}}</div>
                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="ms-auto"><i class="bi fs-1 bi-pencil-square"></i></a>
                        <form action="{{ route('articles.share', ['id' => $article->id]) }}" method="post" target="_blank">
                            @csrf
                            <button type="submit" class="ms-2 bg-transparent"><i class="bi fs-1 bi-share"></i></button>
                        </form>
                        
                        <a class="ms-2" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}"><i class="bi fs-1 bi-trash"></i></a>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <p class="text-break">{!! nl2br(e($article->content)) !!}</p>
            </div>
        </main>
    </div>
</div>
@include('modals.delete_article')
@endsection 