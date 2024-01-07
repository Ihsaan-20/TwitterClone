<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page">Home <span
                                class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Action 1</a>
                            <a class="dropdown-item" href="#">Action 2</a>
                        </div>
                    </li>
                </ul>


                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <form action="{{route('user.logout')}}" method="POST">
                            @csrf
                            <button class="nav-link active" href="" aria-current="page">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <main>
        <div class="container mt-4">
            <div class="container marketing">
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="card p-3">
                            <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%"
                                    fill="#777" dy=".3em">140x140</text>
                            </svg>

                            <h2>Welcome, {{ Auth::user()->name }}!</h2>
                            <div class="d-flex gap-4">
                                <p class="text-muted">Following: {{ Auth::user()->following->count() }}</p>
                                <p class="text-muted">Followers: {{ Auth::user()->followers->count() }}</p>
                            </div>
                            <p>Some representative placeholder content for the three columns of text below the
                                carousel. This is the first column.</p>
                            <p class="text-success">Online</p>
                        </div>
                    </div><!-- /.col-lg-4 -->
                </div>
                <!-- Three columns of text below the carousel -->
                {{-- <div class="row">
                    @forelse ($users as $user)
                       @if($user->id === auth()->id())
                        @continue
                        <div class="col-lg-4 mb-3">
                            <div class="card p-3">
                                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%"
                                        fill="#777" dy=".3em">140x140</text>
                                </svg>

                                <h2>{{ $user->name }}</h2>
                                <div class="d-flex gap-4">
                                    <p class="text-muted">Following: {{ $user->followingCount }}</p>
                                    <p class="text-muted">Followers: {{ $user->followersCount }}</p>
                                </div>
                                <p>Some representative placeholder content for the three columns of text below the
                                    carousel. This is the first column.</p>
                                <p>
                                    @auth
                                        @if (Auth::id() !== $user->id)
                                            @if (Auth::user()->follows($user))
                                                <form action="{{ route('nofollow', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Unfollow</button>
                                                </form>
                                            @else
                                                <form action="{{ route('follow', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Follow</button>
                                                </form>
                                            @endif
                                        @else
                                            <p class="text-success">Online</p>
                                        @endif


                                    @endauth
                                </p>
                            </div>
                        </div><!-- /.col-lg-4 -->
                        @endif

                    @empty
                        <p class="text-muted">No data found!</p>
                    @endforelse


                </div><!-- /.row --> --}}
                <div class="row">
                    @forelse ($users as $user)
                        @if($user->id !== auth()->id())
                            <div class="col-lg-4 mb-3">
                                <div class="card p-3">
                                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%"
                                            fill="#777" dy=".3em">140x140</text>
                                    </svg>

                                    <h2>{{ $user->name }}</h2>
                                    <div class="d-flex gap-4">
                                        <p class="text-muted">Following: {{ $user->followingCount }}</p>
                                        <p class="text-muted">Followers: {{ $user->followersCount }}</p>
                                    </div>
                                    <p>Some representative placeholder content for the three columns of text below the
                                        carousel. This is the first column.</p>
                                    <p>
                                        @auth
                                            @if (Auth::user()->id !== $user->id)
                                                @if (Auth::user()->follows($user))
                                                    <form action="{{ route('nofollow', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Unfollow</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('follow', $user->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Follow</button>
                                                    </form>
                                                @endif
                                            @else
                                                <p class="text-success">Online</p>
                                            @endif
                                        @endauth
                                    </p>
                                </div>
                            </div><!-- /.col-lg-4 -->
                        @endif
                    @empty
                        <p class="text-muted">No data found!</p>
                    @endforelse
                </div><!-- /.row -->





            </div>

        </div>

        <!-- Add more user cards as needed -->

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="{{ asset('bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
