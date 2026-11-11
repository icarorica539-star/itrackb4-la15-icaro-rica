<nav class="navbar navbar-expand-lg navbar-dark bg-dark"
     data-bs-theme="dark">

    <div class="container">

        {{-- APPLICATION BRAND --}}
        <a class="navbar-brand fw-bold"
           href="{{ route('home') }}">
            Academic Subjects
        </a>

        {{-- MOBILE TOGGLE BUTTON --}}
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNav"
                aria-controls="mainNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- NAVIGATION LINKS --}}
        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav ms-auto">

                {{-- HOME LINK --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}">

                        Home

                    </a>

                </li>

                {{-- SUBJECT LIST LINK --}}
                <li class="nav-item">

                    <a class="nav-link {{ request()->routeIs('subjects.*') ? 'active' : '' }}"
                       href="{{ route('subjects.index') }}">

                        Subject List

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
