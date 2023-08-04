@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        @component('layouts.sidebar')
        @endcomponent
        <main class="col ps-md-2 pt-2">

        <!-- サイドバーのトグルボタン -->
        <button href="#" data-bs-target="#sidebar" data-bs-toggle="offcanvas" class="btn border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</button>

            <div class="page-header pt-3">
                <h2>{{ __('This is  the Note-KIri main page.') }}</h2>
            </div>
            <p class="lead">文章を書いて管理、共有などが行えます。</p>
            <hr>
            <div class="row">
                <div class="col-12">
                    <p>右下にございます、新規投稿から始めて頂き、投稿後、左側にあるサイドバーからそれぞれ詳細ページをごらんください。</p>
                    <p>またユーザー名が書かれているドロップダウンから、ログアウトや設定が行えます、設定では投稿の一括削除や作成した共有リンクの一覧をご覧になられます。</p>
                    <p>おまけとして、サイコロを振る機能と当たり判定などがないシンプルなスロットを追加致しました。</p>
                </div>
            </div>
            <!-- 新規投稿作成ボタン -->
            <div class="position-fixed bottom-0 end-0 mb-5 me-4">
                <a href="{{ route('articles.create') }}" class="btn btn-lg btn-success">{{ __('New Post') }} <i class="bi bi-plus-circle"></i></a>
            </div>
        </main>
    </div>
</div>
@endsection