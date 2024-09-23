@extends('layouts.admin')

@section('adminContent')

<section>

  <div class="container my-5">
    <div class="hero-teks-h2">
      <h1>Daftar Galeri<span class="teks-orange"> IKBKSY</span></h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="mt-3">
      <a href="{{ route('addGallery') }}" class="btn btn-primary btn-sm shadow">New Gallery</a>
    </div>

    <div class="table-responsive my-4">
      <table class="table table-bordered table-striped">
        <thead class="text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Event</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = ($galleries->currentPage() - 1) * $galleries->perPage() + 1 @endphp
          @foreach ($galleries as $gallery)
            <tr>
              <td class="text-center">{{ $no++ }}</td>
              <td class="text-center">
                @if ($gallery->name)
                  <img src="{{ asset('storage/' . $gallery->name) }}" alt="{{ Str::limit($gallery->event->name, 10) }}" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @else
                  <img src="{{ asset('storage/default-avatar.jpg') }}" alt="Default Image" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @endif
              </td>
              <td>{{ $gallery->event->name }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  {{-- Button edit --}}
                  {{-- <a type="submit" href="{{ route('updateBlog', $gallery->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                  {{-- Button delete --}}
                  {{-- <form action="{{ route('deleteBlog', $gallery->id) }}" method="POST" onsubmit="return confirm('Are You Sure Delete Gallery ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form> --}}
                </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    {{ $galleries->links() }}

  </div>

</section>

@endsection
