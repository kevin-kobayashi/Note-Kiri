@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>
            <div class="flex p-4 align-baseline gap-6 py-6 m-auto">
                <div class="border border-white p-3">
                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="article-title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="article-title" type="text" class="form-control bg-secondary bg-gradient" name="title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="article-content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <textarea id="article-content" class="form-control bg-secondary bg-gradient" name="content" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection