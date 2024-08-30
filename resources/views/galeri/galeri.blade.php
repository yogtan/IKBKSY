@extends('layouts.main')

@section('container')

  <div class="container mt-5">

    <section>
      <div class="hero-teks-h2">
        <h1>Galeri <span class="teks-orange">IKBKSY</span></h1>
      </div>
    </section>

    <section>
      <div class="my-5">
        <div class="row row-cols-1 row-cols-md-2 g-5  d-flex justify-content-between align-items-center">
          {{-- Card --}}
            <div class="col justify-content-center">
                <div class="card mb-3">
                    <a href=""><img src="../img/hero-bg.svg" class="card-img rounded-0" alt="Galeri IKBKSY" loading="lazy"></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title teks3 fw-light lh-sm">
                        <a href="" class="text-decoration-none text-dark">
                            Gawai Dayak Kabupaten Sanggau : Keseruan Gawai Dayak Mahasiswa YKC
                        </a>
                    </h5>
                <p class="card-text hero-teks2"><small class="text-muted">26 Juli 2023</small></p>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection