<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand mx-3 " href="{{ route('welcome') }}"><span class="logo"></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <li class="nav-item dropdown li-cust mx-5">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-globe" style="color: #01295f;"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item li-cust nav-link">
                        <x-_locale lang="it" nattion="it" />IT
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
    
                    <li class="nav-item li-cust nav-link">
                        <x-_locale lang="en" nattion="gb" />EN
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="nav-item li-cust nav-link">
                        <x-_locale lang="es" nattion="es" />ES
                    </li>
                </ul>
            </li>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <button class="btn" id="btnMoon"><i class="fa-regular fa-moon" style="color: #01295f;"></i></button>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">{{ __('ui.Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{ route('index') }}">{{ __('ui.Annunci') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.Categorie') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('categoryShow', compact('category')) }}">
                                {{__("ui.$category->name")}} </a></li>
                        @endforeach
                    </ul>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">{{ __('ui.Accedi | Registrati') }}</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('article.create') }}">{{ __('ui.Crea Annuncio') }}<i class="fa-solid fa-notes-medical ms-2" style="color: #01295f;"></i>
                        </a>
                    </li>

                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link active position-relative" aria-current="page"
                                href="{{ route('revisor.index') }}">{{ __('ui.Zona Revisore') }}
                                <span
                                    class="position-absolute mt-2 top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                    {{ App\Models\Article::toBeRevisionedCount() }}<span
                                    class="visually-hidden">{{ App\Models\Article::toBeRevisionedCount() }}
                                </span>
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown ms-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.Ciao') }} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="/logout"></a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="nav-link active"><i
                                            class="fa-solid fa-arrow-right-from-bracket ms-2 me-4"
                                            style="color: #1e3050;"></i>{{ __('ui.Logout') }}</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </li>

                <div class="row ms-5">
                    <div class="col-12">
                        <form class="d-flex input-group" role="search" action="{{ route('announcements.search') }}"
                            method="GET">
                            <input name="searched"
                                class="form-control rounded-pill py-2 pr-5 mr-1 bg-transparent text-search"
                                type="search" placeholder="{{ __('ui.Cerca') }}" aria-label="Search">
                            <span class="input-group-append">
                                <div class="input-group-text border-0 bg-transparent ml-n5"></div>
                            </span>
                        </form>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>
