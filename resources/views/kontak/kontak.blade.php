@extends('layouts.main')

@section('container')

  <div class="container mt-5">

    <section>
      <div class="hero-teks-h2">
        <h1>Kontak <span class="teks-orange">IKBKSY</span></h1>
      </div>
    </section>

    <section>
      <div class="my-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5  d-flex justify-content-start align-items-center">
          {{-- Card --}}
            <div class="col d-flex justify-content-center">
                <div class="card h-100 w-75 align-items-center shadow-lg">
                    <div class="card-body">
                        <a href="https://wa.me/+6281215188807" class="fs-5 text-dark text-decoration-none cursor-pointer d-flex align-items-center">
                            <i class="bi bi-telephone fa-2x fa-fw" aria-hidden="true"></i>
                            <span class="ms-2">+628-xxx-xxx-xxx</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card h-100 w-75 align-items-center shadow-lg">
                    <div class="card-body">
                        <a href="https://wa.me/+6281215188807" class="fs-5 text-dark text-decoration-none cursor-pointer d-flex align-items-center">
                            <i class="bi bi-whatsapp fa-2x fa-fw" aria-hidden="true"></i>
                            <span class="ms-2">+628-xxx-xxx-xxx</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card h-100 w-75 align-items-center shadow-lg">
                    <div class="card-body text-light">
                        <a href="https://wa.me/+6281215188807" class="fs-5 text-dark text-decoration-none cursor-pointer d-flex align-items-center">
                            <i class="bi bi-browser-chrome fa-2x fa-fw" aria-hidden="true"></i>
                            <span class="ms-2">IKBKSY</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card h-100 w-75 align-items-center shadow-lg">
                    <div class="card-body">
                        <a href="https://wa.me/+6281215188807" class="fs-5 text-dark text-decoration-none cursor-pointer d-flex align-items-center">
                            <i class="bi bi-instagram fa-2x fa-fw" aria-hidden="true"></i>
                            <span class="ms-2">IKBKSY</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="card h-100 w-75 align-items-center shadow-lg">
                    <div class="card-body">
                        <a href="https://wa.me/+6281215188807" class="fs-5 text-dark text-decoration-none cursor-pointer d-flex align-items-center">
                            <i class="bi bi-youtube fa-2x fa-fw" aria-hidden="true"></i>
                            <span class="ms-2">IKBKSY</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection