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
        <div class="row row-cols-1 row-cols-md-3 g-4">
          @foreach ($events as $event)
            <div class="col">
              <div class="card h-100 shadow">
                <div class="card bg-transparent text-dark">
                  <div class="bg-image hover-overlay ripple">
                    {{-- <img src="{{ asset('storage/' . $event->gallery->first()->name) }}" alt="{{ $event->name }}" class="img-fluid opacity-75" /> --}}
                    @if ($event->gallery->isNotEmpty() && $event->gallery->first()->name) 
                      <img src="{{ asset('storage/' . $event->gallery->first()->name) }}" class="img-fluid opacity-75" alt="{{ $event->name }}" />
                    @else
                      <img src="{{ asset('storage/default-avatar.jpg') }}" class="img-fluid opacity-75" alt="Image default - Avatar" />
                    @endif
                    <a href="{{ route('galeriDetail', $event->slug) }}">
                      <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                    </a>
                  </div>
                  <div class="card-img-overlay d-flex justify-content-center align-items-center">
                    <p class="card-text hero-teks2 fst-normal fw-bolder lh-base text-color-1">
                      {{ Str::limit($event->description, 100) }}
                    </p>
                  </div>
                </div>
                <div class="card-body">
                  <h5 class="card-title teks3 fw-light lh-sm">
                    <a href="{{ route('galeriDetail', $event->slug) }}" class="text-decoration-none text-dark">
                      {{ Str::limit($event->name, 40) }}
                    </a>
                  </h5>
                  <p class="card-text hero-teks2">
                    {{ $event->location }}, {{ $event->publication }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    {{ $events->links() }}
  </div>
@endsection