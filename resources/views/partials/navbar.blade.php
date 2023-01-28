<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(45 62 80)">
    <div class="container">
        <a class="navbar-brand text-bold" href="/">Absensi Siswa</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'dashboard' ? 'active' : '' }}" href="/dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "students") ? 'active' : '' }}" href="/students">Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "classrooms") ? 'active' : '' }}" href="/classrooms">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "presences") ? 'active' : '' }}" href="/presences">Absensi</a>
                </li>

            </ul>
            <ul class="navbar-nav ms-auto">
                @if (session()->has('login'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ session()->get('login')['name'] }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            {{-- <li><a class="dropdown-item" href="/kalkulator"><i
                                        class="bi bi-layout-text-sidebar-reverse"></i>
                                    Kalkulator</a></li>
                            <li> --}}
                                {{-- <hr class="dropdown-divider"> --}}
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-right"></i> Login</a>
                    </li>
                </ul>
                @endif
        </div>
    </div>
</nav>