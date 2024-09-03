@extends('layouts.main')

@section('container')
    <section>
        <div class="container my-5">
            <div class="hero-teks-h2">
                <h1>Tambahkan Pengurus<span class="teks-orange"> IKBKSY</span></h1>
            </div>

            <div class="card shadow mt-4 hero-teks2">
                <div class="card-body">
                    <form action="{{ route('addPengurus') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label fw-bolder">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" value="" required>
                        </div>
                        <div class="mb-4">
                            <label for="floatingSelectGrid" class="form-label fw-bolder">Department</label>
                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_department" value="" required>
                                <option selected>Open this select menu</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->sector }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label fw-bolder">Position</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Position" name="position" value="" required>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label fw-bolder">Image</label>
                            <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image" value="" required>
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
