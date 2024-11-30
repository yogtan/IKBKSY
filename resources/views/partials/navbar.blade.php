<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homeIKBKSY') }}"><img src="{{ asset('img/logo-IKBKSY.svg') }}" width="76px" alt="Logo IKBKSY"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end hero-home3" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border">
                <h5 class="offcanvas-title teks-orange hero-teks-h2" id="offcanvasNavbarLabel">IKBKSY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
            
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item ">
                        <a class="nav-link active me-5" aria-current="page" href="{{ route('homeIKBKSY') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle me-5" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu mt-4">
                            <li><a class="dropdown-item" href="{{ route('sejarahIKBKSY') }}">Sejarah</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logoIKBKSY') }}">Logo</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('visimisiIKBKSY') }}">Visi Misi</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('pengurusIKBKSY') }}">Struktur Forum</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  me-5" href="{{ route('blogIKBKSY') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-5" href="{{ route('galeriIKBKSY') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kontakIKBKSY') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
