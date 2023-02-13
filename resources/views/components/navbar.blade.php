<nav class="navbar fixed-top  navbar-expand-lg navbar-light " style="background-color: #e3f2fd;font-family:cursive">
    <div class="container-fluid">
        <a class="navbar-brand active btn btn-outline-success" href="{{ route('auth.welcome') }}">Library >></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn mx-2 btn-outline-success" href="{{ route('books.index') }}">All Books</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link btn btn-outline-success" href="{{ route('categories.index') }}">
                        @lang('site.cats')
                    </a>
                </li> --}}
                <div class="dropdown">
                    <button class="btn btn-outline-success mx-2 dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('site.cats')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li class="card btn bg-success"><a class=" container dropdown-item btn btn-success" href="{{route('categories.index')}} ">All categories</a></li>
                        <li class="btn btn-primary"><a class="dropdown-item btn " href="{{route('categories.create')}} ">create new categories</a></li>
                        @foreach ($cats as $cat)
                            <li><a class="dropdown-item" href="{{route('categories.show',$cat->id)}} ">{{ $cat->name }}</a></li>
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </ul>

            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success mx-2" href="{{ route('auth.register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary mx-2" href="{{ route('auth.login') }}">Login</a>
                    </li>
                @endguest
                @auth


                    <li class="nav-item">
                        <a href="#" class="nav-link disabled btn btn-outline-info mx-3">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-danger" href="{{ route('auth.logout') }}">Logout</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
