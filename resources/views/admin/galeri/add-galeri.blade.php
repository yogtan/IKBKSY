@extends('layouts.admin')

@section('adminContent')
<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Gallery<span class="teks-orange"> IKBKSY</span></h1>
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
                <form action="{{ route('uploadGalleryImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Event</label>
                        {{-- <select class="form-select" id="floatingSelectGrid" name="id_event"  onchange="window.location.href='{{ url('admin/gallery/add') }}' + '/' + this.value;" required> --}}
                        <select class="form-select" id="floatingSelectGrid" name="id_event" onchange="redirectToEvent(this.value);" required>
                            <option selected>Pilih event</option>
                            @foreach ($events as $event)
                                <option value="{{ $event->id }}" {{ $event->id == $id_event ? 'selected' : '' }}>{{ $event->name }}</option>
                                {{-- <option value="{{ route('addGallery', $event->id) }}" {{ $event->id == $id_event ? 'selected' : '' }}>{{ $event->name }}</option> --}}
                            @endforeach
                        </select>
                        {{-- add new event --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Event</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Images</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" name="images[]" multiple required>
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="btn btn-primary shadow-sm mt-4 fw-bold">Upload</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function redirectToEvent(eventId) {
                if (eventId) {
                    window.location.href = '{{ url('admin/gallery/add') }}' + '/' + eventId;
                }
            }
        </script>

        {{-- Menampilkan gambar yang telah diupload --}}
        @if ($galleries && $galleries->count() > 0)
            <div class="card shadow mt-4 hero-teks2">
                <div class="card-body">
                    <h5 class="card-title my-3 text-center">Pictures Your Post</h5>
                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-md-3 text-center mb-3">
                                <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ $gallery->name }}" loading="lazy" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Menampilkan gambar yang telah dirilis --}}
        @if ($releasedGalleries && $releasedGalleries->count() > 0)
            <div class="card shadow mt-4 hero-teks2">
                <div class="card-body">
                    <h5 class="card-title my-3 text-center">Pictures have been released</h5>
                    <div class="row">
                        @foreach ($releasedGalleries as $gallery)
                            <div class="col-md-3 text-center mb-3">
                                <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ $gallery->name }}" loading="lazy" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

            {{-- Menampilkan gambar yang belum dirilis --}}
        @if ($unreleasedGalleries && $unreleasedGalleries->count() > 0)
            <div class="card shadow mt-4 hero-teks2">
                <div class="card-body">
                    <h5 class="card-title my-3 text-center">Pictures not yet released</h5>
                    <div class="row">
                        @foreach ($unreleasedGalleries as $gallery)
                            <div class="col-md-3 text-center mb-3">
                                <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ $gallery->name }}" loading="lazy" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        @if ($galleries && $galleries->count() > 0)
            <div class="text-center mt-4">
                <a href="{{ route('releaseGallery', $id_event) }}" class="btn btn-success">Release Gallery</a>
            </div>
        @endif

    </div>

    
    {{-- Add new event --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog hero-teks2">
            <div class="modal-content modal-dialog modal-dialog-scrollable">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('addEvent') }}" method="POST">
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
                <form action="{{ route('addCategory') }}" method="POST">
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