@extends('layouts.admin')

@section('adminContent')

<section>
    <div class="container my-5">
        <div class="hero-teks-h2">
            <h1>Tambahkan Pengurus<span class="teks-orange"> IKBKSY</span></h1>
        </div>

        <div class="card shadow mt-4 hero-teks2">
            <div class="card-body">
                <form action="{{ route('updatePengurus', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="name" value="{{ $member->name }}">
                    </div>
                    <div class="mb-4">
                        <label for="floatingSelectGrid" class="form-label fw-bolder">Department</label>
                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name="id_department">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $department->id == $member->id_department ? 'selected' : '' }}>{{ $department->sector }}</option>
                            @endforeach
                        </select>
                        {{-- add new department --}}
                        <div class="ms-1 mt-2">
                            <a href="#" class="pe-auto cursor-pointer" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Department</a>
                          </div>
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Position</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Position" name="position" value="{{ $member->position }}">
                    </div>
                    <div class="mb-4">
                        <label for="exampleFormControlInput1" class="form-label fw-bolder">Image</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .svg" class="form-control" id="exampleFormControlInput1" placeholder="Image" name="image" value="{{ $member->image }}">
                        <!-- Pratinjau gambar -->
                        @if ($member->image)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                            </div>
                        @endif
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
