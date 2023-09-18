@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col ps-md-2 pt-2">
            @include('layouts.header_buttons')
            <div class="pt-0 mt-2 mx-2">
                <div class="border border-white p-3 pb-0">
                    
                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="article-title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="article-title" type="text" class="form-control bg-dark bg-gradient @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
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
                                    <textarea id="article-content" class="form-control bg-dark bg-gradient @error('content') is-invalid @enderror" name="content" rows="15" required>{{ old('content') }}</textarea>
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
                                <button type="submit" class="btn btn-lg btn-primary">{{ __('Submit') }} <i class="bi bi-chat-square-text"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection