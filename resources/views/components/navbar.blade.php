<nav class="navbar navbar-expand-lg navbar-custom w-100 top-0 start-0 fixed-top shadow-lg glass-effect">
  <div class="container-fluid">
    <a class="navbar-brand text-white fw-bold fs-4" href="{{ route('homepage') }}">Presto</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon custom-toggler"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('articles.index') }}">Tutti gli Articoli</a>
        </li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
          <ul class="dropdown-menu futuristic-menu">
            @foreach ($categories as $category)
              <li><a href="{{ route('byCategory', ['category' => $category]) }}" class="dropdown-item text-capitalize">{{ $category->name }}</a></li>
              @if (!$loop->last)
                <hr class="dropdown-divider category-divider">
              @endif
            @endforeach
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end futuristic-menu">
              <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea Annuncio</a></li>
              @if(Auth::user()->is_revisor)
                <li class="nav-item"> 
                  <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25"
                    href="{{ route('revisor.index') }}">Zona Revisore
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ \App\Models\Article::toBeRevisedCount() }}
                  </span>
                  </a>
                </li>
              @endif
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
              </li>
              <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf</form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">Accedi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('register') }}">Registrati</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>


  
