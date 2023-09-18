@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @include('layouts.header')
    <div class="row flex-nowrap">
        <main class="col ps-md-2 pt-2">
            <div class="mx-auto w-100 p-2">
                <div class="mb-1 border-bottom border-secondary pt-3">
                    <h1 class="fw-bolder text-break">{{ $article->title }}</h1>
                    <div class="d-flex pt-1">
                        <div>{{$article->updated_at->format('m d, Y')}}</div>
                        <!-- フォームのURL出力欄 -->
                        <div class="ms-2">{{__('Shared link')}}：</div>
                        <input class="text-info-emphasis" type="text" name="url" value="{{ $sharedLink }}" readonly>
                    </div>
                </div>
            </div>
            <div class="pt-3 p-2 p-lg-5 mb-5">
                <div>
                    <div class="text-break">{!! nl2br(e($article->content)) !!}</div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection 