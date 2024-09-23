<h1>{{ $event->name }}</h1>
<p>{{ $event->description }}</p>
<div class="gallery">
    @foreach($event->galleries as $gallery)
        <img src="{{ asset('gallery/' . $gallery->photo_path) }}" alt="Foto Event">
    @endforeach
</div>
