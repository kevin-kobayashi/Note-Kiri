@extends('layouts.app')

@section('content')
<div class="container">
@include('layouts.header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ __('Reset your password') }}</h1>
                    <p>{{__('Enter your email address and we will send you instructions to reset your password.')}}</p>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ __(session('status')) }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @honeypot
                        @csrf
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success w-100" data-toggle="tooltip" title="送信してから少しお待ちください。">
                                    {{ __('Continue') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                            <a class="btn btn-link" href="{{ route('login') }}" role="button">{{ __('Back to Apps Client') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
