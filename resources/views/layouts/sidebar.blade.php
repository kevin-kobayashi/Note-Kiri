<div class="col-auto px-0">
    <div id="sidebar" class="collapse collapse-horizontal show border-end">
        <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
            @foreach ($latestArticles as $article)
                <a href="{{ route('articles.show', $article->id) }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-dark bg-gradient 
                @if(request()->is('articles/' . $article->id)) active list-group-item-primary @endif" 
                    data-bs-parent="#sidebar">{{ $article->title }}
                </a>
            @endforeach
            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>