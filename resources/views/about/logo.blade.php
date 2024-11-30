@extends('layouts.main')

@section('container')
    <section class="logo">
        <div class="container">

            <div class="hero-teks-h2 mt-5">
                <h1>LOGO <span class="teks-orange"> IKBKSY</span></h1>
            </div>

            <div class="mt-5 text-center">
                <img src="{{ asset('img/logo-ikbksy.svg') }}" class="img-fluid" alt="Logo IKBKSY" style="width: 40%; height: 40%">
            </div>

            <p class="mt-4" style="text-align: justify">
                <div class="hero-teks-h2">
                    <h5>Makna Logo</h5>
                </div>
                <div>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, expedita.</li>
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad, dignissimos voluptatibus?</li>
                        <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam, itaque eius. Maxime eligendi incidunt maiores.</li>
                        <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</li>
                    </ul>
                </div>
            </p>
        </div>
    </section>
@endsection
