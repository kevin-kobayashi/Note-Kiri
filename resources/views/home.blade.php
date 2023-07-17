@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Your password has been successfully changed and you are now logged in.') }}
                    <a class="btn btn-outline-success mt-3" href="{{route('articles.index')}}">Try NoteKiri</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
