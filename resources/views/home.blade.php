@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __(session('status')) }}
                        </div>
                    @endif

                    {{ __('Please click the button below to go to the main page.') }}
                    <a class="btn btn-outline-success mt-3" href="{{route('articles.index')}}">Try NoteKiri</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
