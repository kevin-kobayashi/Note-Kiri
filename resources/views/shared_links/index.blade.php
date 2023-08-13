@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">
            @component('layouts.header_buttons')
            @endcomponent
            <div class="mx-auto w-100 p-4">
                <div class="mb-1 border-bottom border-secondary pt-3 d-flex justify-content-between">
                    <h1>{{ __('Shared Link List') }}</h1>

                    <div class="btn-group dropup">
                        <button class="btn btn-outline-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" data-toggle="tooltip" title="{{__('Bulk deletion')}}" aria-expanded="false">
                            <i class="bi bi-menu-up"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <!-- removeAll -->
                                <button type="submit" class="dropdown-item link-warning" onclick="event.preventDefault(); document.getElementById('removeAll-form').submit();">
                                    {{ __('Bulk deletion of links') }}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-2 mx-3 mb-5">
                <ul class="list-group">
                    @foreach ($articles as $article)
                        <li class="list-group-item bg-transparent">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>{{ __('name')}}：
                                        <a class="link-underline-info link-underline-opacity-0 link-underline-opacity-100-hover" href="{{ $article->shared_link->url }}" target="_blank" data-toggle="tooltip" title="{{__('Shared link')}}">
                                            {{ $article->title }}
                                        </a>
                                    <p>{{ __('Date shared')}}：{{ $article->shared_link->created_at->format('Y-m-d') }}</p>
                                </div>
                                
                                <div class="col-md-4 d-flex align-items-center justify-content-end gap-3">
                                    <a class="btn btn-outline-primary" href="{{ route('articles.show', $article) }}" data-toggle="tooltip" title="{{__('Jump to Article')}}">
                                        <i class="bi bi-chat-left"></i>
                                    </a>
                                    <!-- shared_delete -->
                                    <form id="delete-form" action="{{ route('shared.delete', $article) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();" data-toggle="tooltip" title="{{__('Deletion')}}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- 新規投稿作成ボタン -->
            <!-- <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div> -->
        </main>
    </div>
</div>
<form id="removeAll-form" action="{{ route('shared.removeAll')}}" method="POST">
    @csrf
    @method('DELETE')
</form>
@endsection