@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>
            <div class="mx-auto w-100 p-4">
                <div class="mb-1 border-bottom border-secondary pt-3">
                    <h1 class="fw-bolder">{{ $article->title }}</h1>
                    <div class="pt-3 align-baseline">{{$article->updated_at->format('m d, Y')}}</div>
                </div>
            </div>
            <div class="flax p-4 gap-4 align-baseline m-auto">
                <div class="flex flex-grow flex-col gap-3">
                    <div>{{ $article->content }}</div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection