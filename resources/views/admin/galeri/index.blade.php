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

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
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
            <th scope="col">Event</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $no = ($events->currentPage() - 1) * $events->perPage() + 1 @endphp
          @foreach ($events as $event)
            <tr>
              <td class="text-center">{{ $no++ }}</td>
              <td>{{ Str::limit($event->name, 70) }}</td>
              <td>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center align-items-center">
                  <a href="{{ route('showGallery', $event->id) }}" class="btn btn-info btn-sm">
                    Detail
                  </a>
                  <a type="submit" href="{{ route('updateEvent', ['id' => $event->id, 'source' => 'editGalleryPage']) }}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{ route('deleteEvent', ['id' => $event->id, 'source' => 'deleteGalleryPage']) }}" method="POST" onsubmit="return confirm('Deleting event data may result in the loss and corruption of some data. Are you sure delete data event ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
    {{ $events->links() }}

  </div>

</section>

@endsection
