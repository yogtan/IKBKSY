@extends('layouts.main')

@section('container')
    <section class="Pengurus">
        <div class="container my-5">

            <div class="hero-teks-h2 mt-5">
                <h1>Struktur<span class="teks-orange"> IKBKSY</span></h1>

            </div>

            <section>
                <div class="my-5">
                    <div class="row row-cols-1 row-cols-md-3 g-5 d-flex justify-content-center align-items-center">
                        <!-- Card -->
                        @foreach ($members as $member)
                            <div class="col d-flex flex-column align-items-center justify-content-center">
                                <div class="card mb-3 border-0 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('storage/' . $member->image) }}" class="rounded-circle" alt="{{ $member->name }}" loading="lazy" style="width: 250px; height: 250px; object-fit: cover;">
                                </div>
                                <div class="text-center">
                                    <h5 class="card-title teks3 fw-bold lh-sm">{{ $member->name }}</h5>
                                    <p class="card-text hero-teks2"><small class="text-muted">{{ $member->position }}</small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            
            {{ $members->links() }}

        </div>


    </section>
@endsection
