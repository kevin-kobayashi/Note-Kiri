@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.header')
        <div class="pt-5">
            <div class="d-flex flex-wrap mr-1 justify-content-center">
                <div class="col-xs-6 col-md-8 col-lg-6 ">
                    <h1 class="fs-2 lh-lg">はじめに</h1>
                    <div class="mt-4 fs-5 col-md-12">
                        <div>
                            <p>このアプリは、テキストメモアプリとして作成しました</p>
                        </div>
                        <div class="mt-20 d-flex  align-items-center">
                            <div class="mt-3 ms-auto">
                                <a class="btn btn-lg btn-success" href="{{ route('articles.index') }}">Try NoteKiri</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
@endsection
@push('scripts')
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6017538786866290"
        crossorigin="anonymous"></script>
@endpush
