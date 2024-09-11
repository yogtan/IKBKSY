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
                            <h5 class="card-title">Post Blog</h5>
                            <p class="card-text">Total : {{ $totalBlog }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="card-text text-white" href="{{ route('allBlog') }}">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Pengurus</h5>
                            <p class="card-text">Total : {{ $totalPengurus }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="card-text text-white" href="{{ route('allPengurus') }}">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Department</h5>
                            <p class="card-text">Total : {{ $totalDepartment }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="card-text text-white" href="{{ route('department') }}">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Galeri</h5>
                            {{-- <p class="card-text"> {{ $totalPengurus }}</p> --}}
                        </div>
                        <div class="card-footer">
                            {{-- <a class="card-text text-white" href="{{  route('admin_show_dok') }}">View Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Category</h5>
                            <p class="card-text">Total : {{ $totalCategory }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="card-text text-white" href="{{  route('category') }}">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection