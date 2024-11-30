@extends('layouts.main')

@section('container')

  <div class="container my-5">

    <section>
      <div class="hero-teks-h2">
        <h1>Blog <span class="teks-orange">IKBKSY</span></h1>
      </div>
    </section>

    <section>
      <div class="container my-5">
        <form action="{{ route('blogIKBKSY') }}" method="GET">
          @csrf
          {{-- @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif --}}
          {{-- @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif --}}
          <div class="d-flex justify-content-center gap-3">
            <input type="text" class="form-control w-75 border-2 border-dark deskripsi-h3" placeholder="Search Your Blog" aria-label="Search Your List" name="search" value="{{ request('search') }}">
            <button class="btn btn-primary deskripsi-h3" type="submit">
              Search
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
    </section>

    <section>
      <div class="my-5">
        <div class="row row-cols-1 row-cols-md-2 g-5 d-flex justify-content-between align-items-center">
          {{-- Card --}}
          @foreach ($blogs as $blog)
            <div class="col justify-content-center">
              <div class="card text-bg-dark rounded-0 shadow" style="height: 300px;">
                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img img-fluid opacity-50" alt="{{ Str::limit($blog->title, 60) }}" loading="lazy">
                <div class="card-img-overlay d-flex flex-column justify-content-end">
                  <h5 class="card-title teks3 fw-bolder lh-lg">
                    <a href="{{ route('blogDetail', $blog->slug) }}" class="text-decoration-none text-light">
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

    {{ $blogs->links() }}

  </div>
@endsection