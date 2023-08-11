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
            <div class="p-4">
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