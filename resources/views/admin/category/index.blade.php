@extends('layouts.admin')

@section('adminContent')

<section>

  <div class="container my-5">
    <div class="hero-teks-h2">
      <h1>Daftar Category<span class="teks-orange"> IKBKSY</span></h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="mt-3">
      <a href="{{ route('addCategory') }}" class="btn btn-primary btn-sm shadow">New Category</a>
    </div>

    <div class="table-responsive my-4">
      <table class="table table-bordered table-striped">
        <thead class="text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = ($categories->currentPage() - 1) * $categories->perPage() + 1 @endphp
          @foreach ($categories as $category)
            <tr>
              <td class="text-center">{{ $no++ }}</td>
              <td>{{ $category->category }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  {{-- Button edit --}}
                  <a type="submit" href="{{ route('updateCategory', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  {{-- Button delete --}}
                  <form action="{{ route('deleteCategory', $category->id) }}" method="POST" onsubmit="return confirm('Deleting category data may result in the loss and corruption of some data. Are you sure delete data category ?')">
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

    {{ $categories->links() }}

  </div>

</section>

@endsection
