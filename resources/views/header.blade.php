<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Morphn</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if(Auth::check() && Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('admin-dashboard') }}">Admin Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('edit.posts') }}" class="nav-link btn btn-primary">Edit Posts</a>
                    </li>
                @endif
                @if(!(Auth::check() && Auth::user()->isAdmin()))
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="/">الصفحة الرئيسية</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('posts.index') }}">المنشورات</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.userPosts') }}" class="nav-link btn btn-primary">My Posts</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-block">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('login.form') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{ route('register.form') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
