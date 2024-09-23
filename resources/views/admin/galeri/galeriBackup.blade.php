@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Gallery<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                {{-- <form action="{{ route('addGallery') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ route('uploadGalleryImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Event</label>
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_event" value="" required>
                            <option selected>Open this select menu</option>
                            @foreach ($events as $events)
                            <option value="{{ $events->id }}">{{ $events->name }}</option>
                            @endforeach
                        </select>
                        {{-- add new category --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Category</a>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Image</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="images[]" multiple required>
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="btn btn-primary shadow-sm mt-4 fw-bold">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Menampilkan gambar yang telah diupload  --}}
        {{-- @if ($galleries && $galleries->count() > 0)
            <div class="card shadow mt-4 hero-teks2">
                <div class="card-body">
                    <div class="card-title">
                        @foreach ($galleries as $gallery)
                            <td class="text-center">
                                @if ($gallery->name)
                                <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ Str::limit($gallery->event->name, 10) }}" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
        @else
        <img src="{{ asset('storage/default-avatar.jpg') }}" alt="Default Image" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
        @endif
        </td>
        @endforeach
    </div>
    </div>
    </div>
    @endif --}}

    {{-- Menampilkan gambar yang telah diupload --}}
    @if ($galleries && $galleries->count() > 0)
    <div class="card shadow mt-4 hero-teks2">
        <div class="card-body">
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

    @if ($galleries && $galleries->count() > 0)
    <div class="text-center mt-4">
        <a href="{{ route('releaseGallery', $id_event) }}" class="btn btn-success">Release Gallery</a>
    </div>
    @endif
    </div>

    </div>

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog hero-teks2">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('addCategory') }}" method="POST">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="source" value="addBlogPage">
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
    </div> --}}

</section>

@endsection