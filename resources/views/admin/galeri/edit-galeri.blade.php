@extends('layouts.admin')

@section('adminContent')
<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Edit Gallery <span class="teks-orange"> {{ $gallery->event->name }}</span></h1>
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
                <form action="{{ route('updateGallery', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Event</label>
                        <select class="form-select" id="floatingSelectGrid" readonly disabled>
                            <option selected disabled>Pilih event</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" {{ $event->id == $gallery->id_event ? 'selected' : '' }}>{{ $event->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id_event" value="{{ $gallery->id_event }}">
                        {{-- add new event --}}
                        <div class="ms-1 mt-2 visually-hidden">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Event</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Images</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" name="image" value={{ $gallery->name }}>
                        <!-- Pratinjau gambar -->
                        @if ($gallery->name)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ $gallery->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="btn btn-primary shadow-sm mt-4 fw-bold">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    {{-- Add new event --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog hero-teks2">
            <div class="modal-content modal-dialog modal-dialog-scrollable">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('storeEvent') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="source" value="addGelleryPage">
                        <div class="mb-2">
                            <label for="exampleFormControlInput2" class="form-label fw-bolder">New Event</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Event" name="event" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingSelectGrid" class="form-label fw-bolder">Category</label>
                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_category" value="" required>
                                <option selected>Open this select menu</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            {{-- add new category --}}
                            <div class="ms-1 mt-2">
                                <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleCategory">Add New Category</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput2" class="form-label fw-bolder">Location</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Location" name="location" value="" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput2" class="form-label fw-bolder">Publication</label>
                            <input type="date" class="form-control" id="exampleFormControlInput2" placeholder="Publication" name="publication" value="" required>
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput2" class="form-label fw-bolder">Description</label>
                            <textarea type="text" class="form-control" id="exampleFormControlInput2" style="height: 50px" placeholder="Description" name="description" value="" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-md" type="submit" data-bs-dismiss="modal">Save Category</button>
                        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add new category --}}
    <div class="modal fade" id="exampleCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered hero-teks2">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('storeCategory') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="source" value="addGelleryPage">
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