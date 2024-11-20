<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.galeri.add-gallery');
    }

    public function all()
    {
        // $galleries = Gallery::latest()->paginate(10);
        $events = Event::latest()->paginate(10);

        return view('admin.galeri.index', [
            'title' => 'Gallery - IKBKSY',
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_event = null)
    {
        $events = Event::latest()->get();
        $categories = Category::latest()->get();
        $galleries = collect();
        $releasedGalleries = collect();
        $unreleasedGalleries = collect();

        // Mengatur waktu selama 10 menit
        $timeLimit = Carbon::now()->subMinutes(10);

        if ($id_event) {
            $galleries = Gallery::where('id_event', $id_event)->where('created_at', '>=', $timeLimit)->latest()->paginate(4);
            $releasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', true)->latest()->cursorPaginate(4);
            $unreleasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', false)->latest()->cursorPaginate(4);
            // $unreleasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', false)->latest()->paginate(4);
        }

        return view('admin.galeri.add-galeri', [
            'title' => 'Gallery - IKBKSY',
            'events' => $events,
            'categories' => $categories,
            'galleries' => $galleries,
            'releasedGalleries' => $releasedGalleries,
            'unreleasedGalleries' => $unreleasedGalleries,
            'id_event' => $id_event,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
            'id_event' => 'required|exists:events,id',
        ]);

        $event = Event::find($request->id_event);

        if (!$event) {
            return redirect()->back()->withErrors(['id_event' => 'Event tidak ditemukan.'])->withInput();
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {

                $fileName = $file->getClientOriginalName();
                $image = $file->storeAs('Galeri/' . $event->slug, $fileName);

                Gallery::create([
                    'name' => $image,
                    'id_event' => $request->id_event,
                    'is_released' => false,
                ]);
            }
        }

        return redirect()->route('addGallery', $request->id_event)->with('success', 'Images uploaded successfully!');
    }


    public function showEventGalleries($id_event)
    {
        $events = Event::latest()->get();
        $categories = Category::latest()->get();
        $galleries = Gallery::where('id_event', $id_event)->latest()->paginate(10);
        $releasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', true)->get();
        $unreleasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', false)->get();

        return view('admin.galeri.add-galeri', [ // index
            'title' => 'Gallery - IKBKSY',
            'events' => $events,
            'categories' => $categories,
            'galleries' => $galleries,
            'releasedGalleries' => $releasedGalleries,
            'unreleasedGalleries' => $unreleasedGalleries,
            'id_event' => $id_event,
        ]);
    }

    public function releaseGallery(string $id_event)
    {
        $event = Event::find($id_event);
        Gallery::where('id_event', $id_event)->update(['is_released' => true]);

        return redirect()->route('allGallery')->with('success', 'Gallery released successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $galleries = Gallery::where('id_event', $event->id)->where('is_released', true)->latest()->paginate(10); // Akan menampilkan gambar berdasarkan id_event 

        return view('admin.galeri.gallery', [
            'title' => 'Detail Show - IKBKSY',
            'event' => $event,
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $events = Event::all();
        $gallery = Gallery::find($id);

        return view('admin.galeri.edit-galeri', [
            'title' => 'Detail Show - IKBKSY',
            'categories' => $categories,
            'events' => $events,
            'gallery' => $gallery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_event' => "required",
            'image' => "nullable|image|mimes:jpg,jpeg,png,svg|max:2048",
        ]);

        $gallery = Gallery::find($id);

        // Cek apakah gambar sudah diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($gallery->name && Storage::disk('public')->exists($gallery->name)) {
                Storage::disk('public')->delete($gallery->name);
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = $file->storeAs('Galeri/' . $gallery->event->slug, $fileName);
            $gallery->name = $image;
        }

        // Update data
        $gallery->id_event = $request->id_event;

        // Simpan data
        $gallery->save();

        return redirect()->route('allGallery')->with('success', 'Success update your data gallery');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $gallery = Gallery::find($id);
        // $gallery->delete();

        // Cek blog
        if ($gallery) {
            // Cek apakah ada gambar blog
            if ($gallery->name && Storage::disk('public')->exists($gallery->name)) {
                // Hapus gambar
                Storage::disk('public')->delete($gallery->name);
            }
            // Hapus data user
            $gallery->delete();
        }

        if ($request->source === 'addGelleryPage') {
            // Masih belum akurat
            return redirect()->route('addGallery')->with('success', 'Success delete your picture !');
        } else {
            return redirect()->route('allGallery')->with('success', 'Success delete your picture !');
        }
    }
}
