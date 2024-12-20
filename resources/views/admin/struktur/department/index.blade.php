@extends('layouts.admin')

@section('adminContent')

<section>

  <div class="container my-5">
    <div class="hero-teks-h2">
      <h1>Daftar Department<span class="teks-orange"> IKBKSY</span></h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="mt-3">
      <a href="{{ route('storeDepartment') }}" class="btn btn-primary btn-sm shadow">New Department</a>
    </div>

    <div class="table-responsive my-4">
      <table class="table table-bordered table-striped">
        <thead class="text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Sector</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          {{-- @php $no = 1 @endphp --}}
          @php $no = ($departments->currentPage() - 1) * $departments->perPage() + 1 @endphp
          @foreach ($departments as $department)
            <tr>
              {{-- <td class="text-center">{{ ($departments->currentPage() - 1) * $departments->perPage() + $loop->iteration }}</td> --}}
              <td class="text-center">{{ $no++ }}</td>
              <td>{{ $department->sector }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  {{-- Button edit --}}
                  <a type="submit" href="{{ route('updateDepartment', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  {{-- Button delete --}}
                  <form action="{{ route('deleteDepartment', $department->id) }}" method="POST" onsubmit="return confirm('Deleting department data may result in the loss and corruption of member data. Are you sure delete data Department ?')">
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

    {{ $departments->links() }}

  </div>

</section>

@endsection
