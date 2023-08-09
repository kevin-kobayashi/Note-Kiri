@extends('layouts.app')

@section('content')
<div class="container">
    @component('layouts.header')
    @endcomponent
    <div class="pt-5">
        <div class="d-flex flex-wrap mr-1 justify-content-center">
            <div class="col-xs-6 col-md-8 col-lg-6 ">
                <h1 class="fs-2 lh-lg">はじめに</h1>
                <div class="mt-4 fs-5 col-md-12">
                    <div>
                        <p>このアプリはテキストメモアプリとして作成しました。</p>
                    </div>
                    <div class="mt-20 d-flex row align-items-center">
                        <div class="mr-1">
                            <a class="btn btn-success" href="{{route('articles.index')}}">Try NoteKiri</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @component('layouts.footer')
    @endcomponent
</div>
@endsection