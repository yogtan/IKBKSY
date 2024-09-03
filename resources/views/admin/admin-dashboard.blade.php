@extends('layouts.admin')

@section('adminContent')
    <section class="admin-dashboard mt-5">
        <div class="container">
            <h1>Admin IKBKSY</h1>
            <p>Dashboard</p>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Posts</h5>
                            {{-- <p class="card-text">{{ $totalpost }}</p> --}}
                        </div>
                        <div class="card-footer">
                            {{-- <a class="card-text text-white" href="{{ route('admin_show_posts') }}">View Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Struktur</h5>
                            {{-- <p class="card-text">{{ $totalkategorial }}</p> --}}
                        </div>
                        <div class="card-footer">
                            {{-- <a class="card-text text-white" href="{{ route('admin_show_kategorial') }}">View Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Galeri</h5>
                            {{-- <p class="card-text"> {{ $totaldokumen }}</p> --}}
                        </div>
                        <div class="card-footer">
                            {{-- <a class="card-text text-white" href="{{  route('admin_show_dok') }}">View Details</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection