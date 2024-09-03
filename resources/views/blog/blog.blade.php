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
          @foreach ($blogs as $blog)
            <div class="col justify-content-center">
              <div class="card text-bg-dark rounded-0 shadow h-100">
                <img src="{{ $blog->image }}" class="card-img opacity-50" alt="{{ Str::limit($blog->title, 60) }}" loading="lazy">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title teks3 fw-bolder lh-lg">
                    <a href="" class="text-decoration-none text-light">
                      {{ Str::limit($blog->title, 60) }}
                    </a>
                  </h5>
                  <p class="card-text"><small>{{ $blog->created_at->diffForHumans() }}</small></p>
                </div>
              </div>
            </div>              
          @endforeach
        </div>
      </div>
    </section>
  </div>
@endsection