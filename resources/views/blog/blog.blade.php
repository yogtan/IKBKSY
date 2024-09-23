@extends('layouts.main')

@section('container')

  <div class="container mt-5">

    <section>
      <div class="text-end">
        <p class="mb-0">
          <span class="bg-success text-white px-3 py-1 rounded-pill">{{ $blog->category->category }}</span>
        </p>
      </div>
      <div class="text-center mt-3">
        <h1 class="hero-teks-h2">{{ $blog->title }}</h1>
        <div class="text-center deskripsi-h3">
          <h6>
            <span>{{ $blog->author }}</span>
            <span class="fw-normal">|| {{ $blog->created_at->diffForHumans() }}</span>
          </h6>
        </div>
      </div>
      <div class="text-center mt-5">
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->name }}" class="img-fluid img-blog">
      </div>
      <div class="my-5">
        <p class="lh-base deskripsi-h3" style="text-align: justify;">
          {{ $blog->description }}
        </p>
      </div>

      <div class="my-5">
        <a href="{{ route('blogIKBKSY') }}" class="deskripsi-h3">&laquo; Back to all blog</a>
      </div>
    </section>

    {{-- <section>
      <div class="my-5">
        <div class="row row-cols-1 row-cols-md-2 g-5  d-flex justify-content-between align-items-center">
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
    </section> --}}
  </div>
@endsection