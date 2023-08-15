@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    <br>{{ __('If you did not receive the email') }}
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline" 
                        onclick="event.preventDefault(); document.getElementById('resend-form').submit();" data-toggle="tooltip" title="再送してから少しお待ちください。">
                        {{ __('Resend email') }}
                    </button>

                    <!-- 削除ボタンを追加 -->
                    <form method="POST" action="{{ route('verification.delete') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @component('layouts.footer')
    @endcomponent
</div>
<form id="resend-form" method="POST" action="{{ route('verification.resend') }}" class="d-none">
    @csrf
</form>
div>
