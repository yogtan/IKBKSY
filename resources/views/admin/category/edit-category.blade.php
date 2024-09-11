@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Edit Category<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                <form action="{{ route('updateCategory', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        @csrf
                        <label for="exampleFormControlInput2" class="form-label fw-bolder">New Category</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="New Category" name="category" value="{{ $category->category }}" required>
                    </div>
                    <div class="mb-4 text-center">
                        <button type="submit" class="btn btn-primary shadow-sm mt-4 fw-bold">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection
