@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="ps-md-2 pt-2">
            @include('layouts.header_buttons')
            <div class="mx-auto p-1">
                <div class="border-bottom border-secondary pt-3">
                    <h1 class="fw-bolder text-break">{{ $article->title }}</h1>
                    <div class="d-flex pt-1 align-items-end">
                        <div>{{$article->updated_at->format('m d, Y')}}</div>

                        <a href="{{ route('articles.edit', $article) }}" class="ms-auto btn btn-outline-success" data-toggle="tooltip" title="{{__('Editing')}}">
                            <i class="bi fs-1 bi-pencil-square"></i>
                        </a>
                        
                        <button type="submit" class="ms-3 btn btn-outline-info" onclick="event.preventDefault(); document.getElementById('share-form').submit();" data-toggle="tooltip" title="{{__('Share')}}">
                            <i class="bi fs-1 bi-share"></i>
                        </button>
                        
                        <button class="ms-3 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}" data-toggle="tooltip" title="{{__('Delete Article')}}">
                            <i class="bi fs-1 bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="pt-3 p-2 p-lg-5 mb-5">
                <p class="text-break">{!! nl2br(e($article->content)) !!}</p>
            </div>
        </main>
    </div>
</div>
<form id="share-form" action="{{ route('articles.share', $article) }}" method="post" target="_blank">
    @csrf
</form>
@include('modals.delete_article')
@endsection 