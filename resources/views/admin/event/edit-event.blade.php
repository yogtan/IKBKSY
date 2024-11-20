@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Event<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                <form action="{{ route('updateEvent', $event->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Event</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Event" name="event" value="{{ $event->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Department</label>
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $event->id_category ? 'selected' : '' }}>{{ $category->category }}</option>
                            @endforeach
                        </select>
                        {{-- add new department --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Department</a>
                          </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Location</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Location" name="location" value="{{ $event->location }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Publication</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Time Publication" name="publication" value="{{ $event->publication }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Description</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="Description" style="height: 350px" name="description" value="{{ $event->description }}" required>{{ $event->description }}</textarea>
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="btn btn-primary shadow-sm mt-4 fw-bold">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog hero-teks2">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('storeCategory') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="source" value="addEventPage">
                        <label for="exampleFormControlInput2" class="form-label fw-bolder">New Category</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="New Category" name="newCategory" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-md" type="submit" data-bs-dismiss="modal">Save Category</button>
                        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection
