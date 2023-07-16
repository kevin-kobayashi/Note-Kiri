@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <h1>This is Main Page!!</h1>
        <div>
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
    </div>
</div>
@endsection