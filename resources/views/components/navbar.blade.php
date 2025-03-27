<nav class="navbar navbar-expand-lg navbar-custom w-100 top-0 start-0 fixed-top shadow-lg glass-effect">

  <div class="container-fluid">

    <a class="navbar-brand text-white fw-bold fs-4" href="{{ route('homepage') }}"><img
        src="{{ Storage::url('image/icons.svg') }}" alt="Presto"></a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">

      <span class="navbar-toggler-icon custom-toggler"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('articles.index') }}">{{__('ui.allannounces')}}</a>
        </li>

        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.nav_category')}}</a>
          <ul class="dropdown-menu futuristic-menu">
            @foreach ($categories as $category)
              <li><a href="{{ route('byCategory', ['category' => $category]) }}" class="dropdown-item text-capitalize">{{__("ui.$category->name")}}</a></li>
              @if (!$loop->last)
                <hr class="dropdown-divider category-divider">
              @endif
            @endforeach
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav">

        {{-- ricerca --}}
        <div class=" ">

          <form action="{{ route('article.search') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"
            method="GET">
            @if (session()->has('error_search'))
<<<<<<< HEAD

             <input type="search" name="query" class="form-control is-invalid" placeholder="Non può essere vuoto"
              aria-label="Search">
            @else
              <input type="search" name="query" class="form-control" placeholder="Cerca" aria-label="Search">
            @endif
          </form>

        </div>
        {{-- fine ricerca --}}

        @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu dropdown-menu-end futuristic-menu">
        <li><a class="dropdown-item" href="{{ route('create.article') }}"> Crea Annuncio</a></li>
        @if (Auth::user()->is_revisor)
      <li class="nav-item">
        <a class="nav-link btn btn-sm position-relative w-sm-25" href="{{ route('revisor.index') }}">Zona Revisore
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ \App\Models\Article::toBeRevisedCount() }}
        </span>
        </a>
      </li>
    @endif
        <li>
          <a class="dropdown-item" href="#"
          onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a>
        </li>
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf
=======
<<<<<<< HEAD
              <input type="search" name="query" class="form-control is-invalid" placeholder="can't be empty" aria-label="search">
            @else
              <input type="search" name="query" class="form-control" placeholder="{{__('ui.nav_search')}}" aria-label="search">
            @endif
              <button type="submit" class="input-group-text btn btn_custom" id="basic-addon2">
              {{__('ui.nav_search')}}
              </button>
          </div>
>>>>>>> translating
        </form>
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end futuristic-menu">
              <li><a class="dropdown-item" href="{{ route('create.article') }}">{{__('ui.create_announce')}}</a></li>
              @if(Auth::user()->is_revisor)
                <li class="nav-item"> 
                  <a class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25"
                    href="{{ route('revisor.index') }}">{{__('ui.revisor_zone')}}
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    {{ \App\Models\Article::toBeRevisedCount() }}
                  </span>
                  </a>
                </li>
              @endif
              <li>
                <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{__('ui.logout')}}</a>
              </li>
              <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf</form>
            </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('login') }}">{{__('ui.login')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('register') }}">{{__('ui.signin')}}</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>