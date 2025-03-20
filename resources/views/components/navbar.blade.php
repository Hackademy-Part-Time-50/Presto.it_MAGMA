<nav class="navbar navbar-expand-lg fixed-top navbar_custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}">Presto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('articles.index') }}">Tutti gli Articoli</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li><a href="{{ route('byCategory', ['category' => $category]) }}" class="dropdown-item text-capitalize">{{ $category->name }}</a></li>
              @if (!$loop->last)
                <hr class="dropdown-divider">
              @endif
            @endforeach
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea Annuncio</a></li>
              <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                Logout</a>
              </li>
              <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf</form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
