@extends('layouts.app')

@section('content')
<div class="container">
@component('layouts.header')
@endcomponent
    <div class="pt-5">
        <div class="d-flex flex-wrap me-1">
            <div class="col-xs-6 col-md-5 col-lg-6 ">
                <h1 class="fs-2 lh-lg">Introducing Note-Kiri</h1>
                <div class="mt-4 fs-5 col-md-12">
                    <div>
                        <p>I created this application as a text note application. 
                            I hope this app will fill someone's demand. 
                            I plan to keep updating it and hope to do so for many years to come.</p>
                    </div>
                    <div class="mt-20 d-flex row align-items-center">
                        <div class="mr-1">
                            <a class="btn btn-outline-danger" href="{{route('articles.index')}}">Try NoteKiri</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection