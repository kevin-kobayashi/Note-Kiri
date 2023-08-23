@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    <h5>{{ __('Create your account') }}</h5>
                    {{__('Please note that email verification is required for sign-up.')}}
                </div>

                <div class="card-body pb-0">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @honeypot
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('The email address you entered may be in the wrong format or may have already been registered.') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="border border border-success px-2">
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __($message) }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div id="passwordHelpBlock" class="form-text mb-2">
                                {{__('At least 8 to 24 characters, including alphanumeric characters (A to Z, a to z, 0 to 9) and at least one special character (special characters: @, #, $, %, ^, &, +, =, - are allowed)')}}
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <label class="btn link-btn" for="terms_of_service">
                                <input type="checkbox" id="terms_of_service" class="@error('terms_of_service') is-invalid @enderror" name="terms_of_service" required>
                                <a href="{{route('terms')}}">{{__('Terms of Use')}}</a>に同意します
                                @error('terms_of_service')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('Agreement to the Terms of Use is required.') }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="btn link-btn" for="privacy_policy">
                                <input type="checkbox" id="privacy_policy" class="@error('privacy_policy') is-invalid @enderror" name="privacy_policy" required>
                                <a href="{{route('privacy-terms')}}">{{__('Privacy Policy')}}</a>に同意します
                                @error('privacy_policy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('Privacy Policy agreement is required.') }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                        <p>{{ __('Already have an account?')}}<a class="btn btn-link" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            <button type="submit" class="btn btn-outline-success w-75" onclick="event.preventDefault(); document.getElementById('register-form').submit();" data-toggle="tooltip" title="登録ボタンを押してから少しお待ちください。">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
