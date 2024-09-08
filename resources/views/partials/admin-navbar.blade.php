<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-success" style="margin-left: 210px;">
    <div class="container">
        <!-- Tombol toggler untuk mengontrol tampilan sidebar -->
        <button class="navbar-toggler d-lg-block" type="button" id="sidebarToggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Item-item menu navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- Item-item menu navbar -->
            </ul>
        </div>
        <!-- Dropdown ditempatkan di sebelah kanan menggunakan ml-auto -->
        <div class="dropdown mx-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin') }}">Dasboard</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="/"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Sign out
                </a>

            </ul>
        </div>
    </div>
</nav>
