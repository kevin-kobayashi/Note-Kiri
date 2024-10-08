@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col ps-md-2 pt-2">
            @include('layouts.header_buttons')
            <div class="pt-0 mt-2 mx-2">
                <div class="border border-white pt-2 p-3 pb-0">
                    
                    <form action="{{ route('articles.update', $article) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label for="article-title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="article-title" type="text" class="form-control bg-dark bg-gradient" name="title" value="{{ old('title', $article->title) }}" required>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="article-content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label> -->

                            <div class="col-lg-12 col-md-12 p-lg-5">
                                <div>
                                    <textarea id="article-content" class="form-control bg-dark bg-gradient" name="content" rows="15" required>{{ old('content', str_replace('<br>', "\n", $article->content)) }}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 text-end">
                                <button type="submit" class="btn btn-lg btn-primary text-end">{{ __('Update') }} <i class="bi bi-chat-square-text"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 新規投稿作成ボタン -->
            <!-- <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div> -->
        </main>
    </div>
</div>
@endsection
