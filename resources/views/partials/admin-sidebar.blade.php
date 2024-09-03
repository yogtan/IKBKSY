<div class="sidebar" id="sidebar">
    <div id="side" class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark bg-dark"
        style="width: 230px; height: 100%; position: fixed;">

        <a href="/admin/dashboard" class="d-flex align-items-center mb-3 mb-md-0 mx-3 me-md-auto text-white text-decoration-none">
            <span class="fs-4 fw-bold">ADMIN</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-1">
                <a href="/admin/dashboard" class="nav-link text-white {{ Request::is('admin/dashboard*') ? 'active' : '' }}" aria-current="page">
                    {{-- <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg> --}}
                    Dashboard
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="/admin/posts" class="nav-link text-white {{ Request::is('admin/posts*') ? 'active' : '' }}" aria-current="page">
                    {{-- <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg> --}}
                    Posts
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="/admin/kategorial" class="nav-link text-white {{ Request::is('admin/kategorial*') ? 'active' : '' }}" aria-current="page">
                    {{-- <svg class="bi pe-none me-2" width="16" height="16"> --}}
                        <use xlink:href="#grid" />
                    </svg>
                    Struktur
                </a>
            </li>
            
            <li class="nav-item mb-1">
                <a href="/admin/galeri" class="nav-link text-white {{ Request::is('admin/galeri*') ? 'active' : '' }}" aria-current="page">
                    {{-- <svg class="bi pe-none me-2" width="16" height="16"> --}}
                        <use xlink:href="#grid" />
                    </svg>
                Galeri   
                </a>
            </li>


        </ul>
        <hr>

    </div>
</div>
