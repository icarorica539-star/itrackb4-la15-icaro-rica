<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        {{-- Brand and Main Navigation --}}
        <div class="d-flex align-items-center">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Academic Subjects
            </a>

            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subjects.index') }}">
                        Subject List
                    </a>
                </li>
            </ul>
        </div>

        {{-- Authentication Navigation --}}
        <ul class="navbar-nav ms-auto flex-row gap-3">

            {{-- Guest Navigation --}}
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        Log in
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Register
                    </a>
                </li>
            @endguest

            {{-- Authenticated User Navigation --}}
            @auth
                <li class="nav-item">
                    <span class="nav-link">
                        {{ Auth::user()->name }}
                    </span>
                </li>

                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button
                            class="nav-link btn btn-link text-white"
                            type="submit">
                            Log out
                        </button>
                    </form>
                </li>
            @endauth

        </ul>
    </div>
</nav>
