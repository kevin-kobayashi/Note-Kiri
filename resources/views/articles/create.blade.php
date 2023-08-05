@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">
            @component('layouts.header_buttons')
            @endcomponent
            <div class="p-4 align-baseline">
                <div class="border border-white p-3">
                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="article-title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="article-title" type="text" class="form-control bg-dark bg-gradient" name="title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- <label for="article-content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label> -->

                            <div class="p-4 gap-4 m-auto">
                                <div class="gap-3">
                                    <textarea id="article-content" class="form-control bg-dark bg-gradient" name="content" rows="15"></textarea>
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