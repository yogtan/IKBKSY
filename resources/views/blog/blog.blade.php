@extends('layouts.main')

@section('container')

  <div class="container mt-5">

    <section>
      <div class="hero-teks-h2">
        <h1>Blog <span class="teks-orange">IKBKSY</span></h1>
      </div>
    </section>

    <section>
      <div class="my-5">
        <div class="row row-cols-1 row-cols-md-2 g-5  d-flex justify-content-between align-items-center">
          {{-- Card --}}
          <div class="col justify-content-center">
            <div class="card text-bg-dark rounded-0 shadow h-100">
              <img src="../img/hero-bg.svg" class="card-img opacity-50" alt="Berita IKBKSY" loading="lazy">
              <div class="card-img-overlay d-flex flex-column justify-content-end">
                <h5 class="card-title teks3 fw-bolder lh-lg">
                  <a href="" class="text-decoration-none text-light">
                    {{-- Batasi kalimat   --}}
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quibusdam eaque at aliquid eligendi, pariatur deserunt temporibus laudantium velit ab!
                  </a>
                </h5>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection