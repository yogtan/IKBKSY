@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Blog<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                <form action="{{ route('updateBlog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Author</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author" name="author" value="{{ $blog->author }}">
                    </div>
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Department</label>
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $blog->id_category ? 'selected' : '' }}>{{ $category->category }}</option>
                            @endforeach
                        </select>
                        {{-- add new department --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Department</a>
                          </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Publication</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Publication" name="publication" value="{{ $blog->publication }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Image</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image" value="{{ $blog->image }}">
                        <!-- Pratinjau gambar -->
                        @if ($blog->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Description</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="Description" style="height: 350px" name="description" value="{{ $blog->description }}">{{ $blog->description }}</textarea>
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
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Add New Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('addDepartment') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="source" value="addPengurusPage">
                        <label for="exampleFormControlInput2" class="form-label fw-bolder">New Department</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="New Department" name="newDepartment" value="" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-md" type="submit" data-bs-dismiss="modal">Save Department</button>
                        <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection
