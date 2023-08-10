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
                        <button class="btn btn-outline-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-menu-up"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <form action="{{ route('shared.removeAll')}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item link-warning">{{ __('Bulk deletion of links') }}</button>
                                </form>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="flax p-4 gap-4 align-baseline m-auto">
                <ul class="list-group">
                    @foreach ($articles as $article)
                        <li class="list-group-item bg-transparent">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>{{ __('name')}}：<a href="{{ $article->shared_link->url }}" target="_blank">{{ $article->title }}</a></p>
                                    <p>{{ __('Date shared')}}：{{ $article->shared_link->created_at->format('Y-m-d') }}</p>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <a class="btn btn-transparent" href="{{ route('articles.show', $article->id) }}"><i class="bi bi-chat-left"></i></a>

                                    <form action="{{ route('shared.delete', ['id' => $article->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-transparent"><i class="bi bi-trash"></i></button>
                                    </form>
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