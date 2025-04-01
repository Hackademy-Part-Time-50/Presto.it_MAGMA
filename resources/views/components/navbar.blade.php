<nav class="navbar justify-content-between text-center">

    {{-- logo --}}
    <div class="logo">
        <a href="{{ route('homepage') }}">
            <img src="{{ Storage::url('image/icons.svg') }}" alt="Presto">
        </a>
    </div>
    {{-- fine logo --}}






        <ul class="menu mb-0 me-auto">
            {{-- tutti gli annunci --}}
            <li class="nav-item">
                <a href="{{ route('articles.index') }}">{{ __('ui.allannounces') }}</a>
            </li>
            {{-- fine tutti annunci --}}
        </ul>



        {{-- form ricerca --}}

        <ul class="mb-0">

            <form action="{{ route('article.search') }}" role="search" method="GET">
                @if (session()->has('error_search'))
                    <input type="search" name="query" class="form-control is-invalid"
                        placeholder="Non può essere vuoto" aria-label="Search">
                @else
                    <input type="search" name="query" class="form-control" placeholder="{{ __('ui.nav_search') }}"
                        aria-label="Search">
                @endif
            </form>

        </ul>


        {{-- fine form ricerca --}}

        {{-- hamburger menu --}}


        <div class="toggle-btn me-2 ms-auto">
            <div class="icon">

            </div>
        </div>
        {{-- fine hamburgermenu --}}


        <ul class="menu mb-0">


            {{-- categorie --}}
            <li class="submenu-wrapper">
                <a href="">
                    {{ __('ui.nav_category') }}
                    <span class="span"> > </span>
                </a>
                <ul class="submenu">
                    @foreach ($categories as $category)
                        <li><a href="{{ route('byCategory', ['category' => $category]) }}">
                                {{ __("ui.$category->name") }}
                            </a>
                        </li>
                        @if (!$loop->last)
                            <hr class="dropdown-divider category-divider">
                        @endif
                    @endforeach
                </ul>
            </li>

            {{-- fine categorie --}}

            {{-- lingue disponibili --}}
            <li class="submenu-wrapper">
                <a href="#">{{__('ui.lang')}}<span class="span"> > </span>
                </a>
                <ul class="submenu">
                    <li><a href="#"> <x-_locale lang="it" /></a></li>
                    <li><a href="#"> <x-_locale lang="en" /></a></li>
                    <li><a href="#"> <x-_locale lang="es" /></a></li>
                </ul>
            </li>



            {{-- fine lingue disponibili --}}




            {{-- accesso autenticazione --}}

            @auth
                <li class="submenu-wrapper">
                    <a href="#">
                        {{ Auth::user()->name }}
                        <span class="span"> > </span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('create.article') }}">
                                {{ __('ui.create_announce') }}
                            </a>
                        </li>
                        @if (Auth::user()->is_revisor)
                            <li>
                                <a href="{{ route('revisor.index') }}">{{ __('ui.revisor_zone') }}
                                    <span>{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.logout') }}</a>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout">@csrf
                        </form>
                    </ul>
                @else
                <li>
                    <a href="{{ route('login') }}"> Account
                    </a>
                </li>

            @endauth
            {{-- fine accesso autenticazione --}}

   
</nav>
