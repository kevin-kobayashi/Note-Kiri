<div class="col-auto px-0 pt-2">
    <div id="sidebar" class="offcanvas offcanvas-start overflow-y-auto" data-bs-theme="dark" data-bs-backdrop="true" tabindex="-1" aria-labelledby="sidebarLabel">
        <nav class="d-flex flex-column">
            <div class="offcanvas-body">
                <!-- サイドバーのトグルボタン -->
                <button data-bs-dismiss="offcanvas" class="border rounded-3 p-1 text-decoration-none mb-3"><i class="fs-1 bi bi-caret-left-fill px-1"></i><i class="fs-1 bi bi-back px-1"></i></button>
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start " style="max-height: 80vh;">
                    @foreach ($latestArticles as $article)
                        <a href="{{ route('articles.show', $article->id) }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-dark bg-gradient @if(request()->is('articles/' . $article->id)) active list-group-item-danger text-white @endif" data-bs-parent="#sidebar">{{ $article->title }}</a>
                    @endforeach
                </div>
            </div>
            
            <!-- ドロップダウンメニュー -->
            <div class="dropdown-center">
                <button class="w-100 btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> {{$username}}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><hr class="dropdown-divider border-danger"></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}</a></li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <!-- サイコロを振るツール -->
            @component('tools.dice_roll')
            @endcomponent

            <!-- スロットを表示するツール -->
            @component('tools.slot')
            @endcomponent
            
        </nav>
    </div>
</div>