@extends('layouts.admin')

@section('adminContent')

<section>

  <div class="container my-5">
    <div class="hero-teks-h2">
      <h1>Daftar Pengurus<span class="teks-orange"> IKBKSY</span></h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="mt-3">
      {{-- <button class="btn btn-primary btn-sm me-md-2" type="button">New Member</button> --}}
      <a href="{{ route('addPengurus') }}" class="btn btn-primary btn-sm shadow">New Member</a>
    </div>

    <div class="table-responsive my-4">
      <table class="table table-bordered table-striped">
        <thead class="text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Foto</th>
            <th scope="col">Position</th>
            <th scope="col">Department</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1 @endphp
          @foreach ($members as $member)
            <tr class="text-center">
              <td>{{ $no++ }}</td>
              <td>{{ $member->name }}</td>
              <td>
                @if ($member->image)
                  <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @else
                  <img src="{{ asset('storage/default-avatar.png') }}" alt="Default Image" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @endif
              </td>
              <td>{{ $member->position }}</td>
              <td>{{ $member->department->sector }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  {{-- Button edit --}}
                  <a type="submit" href="{{ route('updatePengurus', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  {{-- Button delete --}}
                  <form action="{{ route('deletePengurus', $member->id) }}" method="POST" onsubmit="return confirm('Are You Sure Delete Data Member ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

</section>

@endsection