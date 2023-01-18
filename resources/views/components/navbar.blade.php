<nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Library >></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">All Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">All Categories</a>
                </li>
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
