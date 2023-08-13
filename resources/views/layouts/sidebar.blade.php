<div class="col-auto px-0 pt-2">
    <div id="sidebar" class="offcanvas offcanvas-start overflow-y-auto" data-bs-theme="dark" data-bs-backdrop="true" tabindex="-1" aria-labelledby="sidebarLabel">
        <nav class="d-flex flex-column">
            <div class="offcanvas-body">

                <div class="d-flex align-items-center justify-content-center mb-2">
                    <!-- 新規投稿作成ボタン -->
                    <a href="{{ route('articles.create') }}" class="w-75 btn btn-lg border"><i class="bi bi-plus-lg"></i> {{ __('New Post') }}</a>
                    <!-- サイドバーのトグルボタン -->
                    <button data-bs-dismiss="offcanvas" class="bg-transparent rounded-3 pt-0 px-3 m-2"><i class="fs-1 bi bi-layout-sidebar"></i></button>
                </div>

                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start " style="max-height: 80vh;">
                    @foreach ($latestArticles as $article)
                        <a href="{{ route('articles.show', $article) }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-gradient 
                            @if(request()->is('articles/' . $article->id)) active text-light @endif" data-bs-parent="#sidebar">{{ $article->title }}</a>
                    @endforeach
                </div>

                <div class="d-flex align-items-center justify-content-center mt-2">
                    <div class="btn-group dropup">
                        <button class="btn btn-lg border dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> {{$username}}
                        </button>
                        <!-- ドロップダウンメニュー --> 
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- サイドバーのトグルボタン -->
                    <button data-bs-dismiss="offcanvas" class="bg-transparent rounded-3 pt-0 px-3 m-2"><i class="fs-1 bi bi-layout-sidebar"></i></button>
                </div>
            </div>

            <!-- サイコロを振るツール -->
            <!-- @component('tools.dice_roll')
            @endcomponent -->

            <!-- スロットを表示するツール -->
            @component('tools.slot')
            @endcomponent
        </nav>
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>