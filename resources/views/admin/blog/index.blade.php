@extends('layouts.admin')

@section('adminContent')

<section>

  <div class="container my-5">
    <div class="hero-teks-h2">
      <h1>Daftar Blog<span class="teks-orange"> IKBKSY</span></h1>
    </div>

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="mt-3">
      <a href="{{ route('addBlog') }}" class="btn btn-primary btn-sm shadow">New Blog</a>
    </div>

    <div class="table-responsive my-4">
      <table class="table table-bordered table-striped">
        <thead class="text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Publication</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = ($blogs->currentPage() - 1) * $blogs->perPage() + 1 @endphp
          @foreach ($blogs as $blog)
            <tr>
              <td class="text-center">{{ $no++ }}</td>
              <td>{{ $blog->author }}</td>
              <td>{{ Str::limit($blog->title, 50) }}</td>
              <td>{{ $blog->category->category }}</td>
              <td>{{ \Carbon\Carbon::parse($blog->publication)->format('d-m-Y') }}</td>
              <td class="text-center">
                @if ($blog->image)
                  <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ Str::limit($blog->title, 10) }}" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @else
                  <img src="{{ asset('storage/default-avatar.jpg') }}" alt="Default Image" loading="lazy" style="width: 50px; height: 50px; object-fit: cover;">
                @endif
              </td>
              <td>{{ Str::limit($blog->description, 50) }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  {{-- Button edit --}}
                  <a type="submit" href="{{ route('updateBlog', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                  {{-- Button delete --}}
                  <form action="{{ route('deleteBlog', $blog->id) }}" method="POST" onsubmit="return confirm('Are You Sure Delete Blog ?')">
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

    {{ $blogs->links() }}

  </div>

</section>

@endsection
