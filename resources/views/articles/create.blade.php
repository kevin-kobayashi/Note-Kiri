@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">

            <!-- サイドバーのトグルボタン -->
            <button href="#" data-bs-target="#sidebar" data-bs-toggle="offcanvas" class="btn border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</button>
            
            <div class="flex p-4 align-baseline gap-6 py-6 m-auto">
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

                            <div class="flex p-4 gap-4 m-auto">
                                <div class="flex flex-grow flex-col gap-3">
                                    <textarea id="article-content" class="form-control bg-dark bg-gradient" name="content" rows="15"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 text-start">
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