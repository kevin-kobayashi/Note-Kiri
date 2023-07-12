@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column justify-content-center align-items-center vh-100 bg-gray-50 dark:bg-gray-800 ">
    <div class="w-100 text-center">
        <div class="mb-2">Welcome to NoteKiri</div>
        <div class="mb-4">Log in with your account to continue</div>
        <div class="d-flex flex-row gap-3 justify-content-center">
            <a class="btn btn-info" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
            <a class="btn btn-info" href="{{ route('register') }}" role="button">{{ __('Register') }}</a>
        </div>
    </div>
</div>
@endsection