@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-3">
        
        @component('layouts.header_buttons')
        @endcomponent
            <div class="page-header pt-3">
                <h2 class="border-bottom border-danger-subtle">{{ __('This is the Note-Kiri.') }}</h2>
            </div>
            <p class="mt-3">私たちのテキストメモアプリは、シンプルさと機能性を融合させた、あなたの文章管理の理想的なパートナーです。
                <abbr title="Create, Read, Update, Delete"><strong>CRUD</strong></abbr>機能は勿論のこと、<abbr title="セキュアな一時リンク"><strong>署名付きURL</strong></abbr>を使用して内容を共有することができます。
                この独自の機能により、効果的に共有でき、一歩進んだ管理が可能です。
            </p>
            <hr>
            <dl class="row">
                <dt class="col-md-3 lead pb-3">{{__('Main Features and Functions')}}：</dt>
                <dd class="col-md-9">
                    <ul>
                        <li>
                            <strong>{{__('Seamless text management')}}：</strong> <p>素早く新しいメモを作成し、既存のメモを編集したり削除したりすることができます。シンプルなインターフェースで、
                                あなたのアイデアや重要な情報を整理します。素早く新しいメモを作成し、既存のメモを編集したり削除したりすることができます。シンプルなインターフェースで、あなたのアイデアや重要な情報を整理します。</p>
                        </li>
                        <li>
                            <strong>{{__('Share Signed URL')}}：</strong>文章を共有する際、署名付きURLを使用することで、URLを共有した相手のみと安全に共有できます。
                        </li>
                    </ul>
                </dd>
                <dd>
                    <a href="{{route('terms')}}">利用規約</a>
                    <a href="{{route('privacy-terms')}}">プライバシーポリシー</a>
                </dd>
            </dl>
            <!-- 新規投稿作成ボタン -->
            <!-- <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div> -->
        </main>
    </div>
</div>
@endsection