@extends('layouts.main')

@section('container')

  <div class="container mt-5">
    <section>
        <div class="text-end">
            <p class="mb-0">
              <span class="bg-success text-white px-3 py-1 rounded-pill">{{ $event->category->category }}</span>
            </p>
          </div>
          <div class="text-center mt-3">
            <h1 class="hero-teks-h2">{{ $event->name }}</h1>
            <div class="text-center deskripsi-h3">
              <h6>
                <span class="fw-normal">{{ $event->location }} || {{ $event->publication }}</span>
              </h6>
            </div>
        </div>
        <div class="my-5">
            <div class="row row-cols-1 row-cols-md-3 g-5">
                @foreach ($galleries as $gallery)
                    <div class="col">
                        <div class="h-100 d-flex justify-content-center align-items-center p-3">
                            <div class="bg-transparent text-dark">
                                <div class="bg-image hover-overlay ripple">
                                    <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ $gallery->event->name }}" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="my-5">
            <a href="{{ route('galeriIKBKSY') }}" class="deskripsi-h3">&laquo; Back to all gallery</a>
        </div>
    </section>

    {{ $galleries->links() }}
  </div>
@endsection
