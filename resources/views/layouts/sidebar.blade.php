<div class="col-auto px-0 pt-2">
    <div id="sidebar" class="collapse collapse-horizontal show border-end border-bottom">
        <nav class="d-flex flex-column">
            <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start overflow-y-auto" style="max-height: 80vh;">
                @foreach ($latestArticles as $article)
                    <a href="{{ route('articles.show', $article->id) }}" class="list-group-item border-end-0 d-inline-block text-truncate bg-dark bg-gradient 
                    @if(request()->is('articles/' . $article->id)) active list-group-item-primary @endif" 
                        data-bs-parent="#sidebar">{{ $article->title }}
                    </a>
                @endforeach
            </div>
            <div class="dropdown-center">
                <button class="w-100 btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="me-1 bi bi-person-circle"></i>{{$username}}
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    <li><hr class="dropdown-divider border-danger"></li>
                    <li><a class="dropdown-item" href="#">Action two</a></li>
                    <li><a class="dropdown-item" href="#">Action three</a></li>
                </ul>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </div>
</div>