@extends('layouts.app')

@section('content')
<div class="container">
    @component('layouts.header')
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mt-3">
            <h1 class="display-1 text-muted">404</h1>
            <h2 class="mb-4">{{ __('Oops! The page you are looking for could not be found.') }}</h2>
            <a href="{{ url('/') }}" class="btn btn-primary">{{ __('Go Back to Home') }}</a>
        </div>
    </div>
    @component('layouts.footer')
    @endcomponent
</div>
@endsection

