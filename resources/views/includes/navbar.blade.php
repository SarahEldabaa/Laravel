<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Users
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item {{ request()->is('users') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">List</a></li>
                        <li><a class="dropdown-item {{ request()->is('users/create') ? 'active' : '' }}"
                                href="{{ route('users.create') }}">New User</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Posts
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item {{ request()->is('posts') ? 'active' : '' }}"
                                href="{{ route('posts.index') }}">List</a></li>
                        <li><a class="dropdown-item {{ request()->is('posts/create') ? 'active' : '' }}"
                                href="{{ route('posts.create') }}">New post</a></li>
                    </ul>
                </li>
            </ul>
            {{-- <div class="d-flex  justify-content-end">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2"> Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light me-2"> Register</a>
                @endguest
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Logout</button>
                </form>
            </div> --}}
        </div>
    </div>
</nav>
