@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Blog<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                <form action="{{ route('addBlog') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Title</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Author</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Author" name="author" value="" required>
                    </div>
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Category</label>
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_category" value="" required>
                            <option selected>Open this select menu</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        {{-- add new category --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Category</a>
                          </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Publication</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Publication" name="publication" value="" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Image</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image" value="" required>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Description</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="Description" style="height: 350px" name="description" value="" required></textarea>
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
    </div>

</section>

@endsection
