<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function all()
    {
        // $galleries = Gallery::latest()->paginate(10);
        $galleries = Gallery::where('is_released', true)->latest()->paginate(10);

        return view('admin.galeri.index', [
            'title' => 'Gallery - IKBKSY',
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id_event = null)
    {
        $events = Event::all();
        $categories = Category::all();
        $galleries = null;

        // if ($id_event) {
        //     $galleries = Gallery::where('id_event', $id_event)->get();
        // }

        if ($id_event) {
            $galleries = Gallery::where('id_event', $id_event)->get();
            $releasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', true)->get();
            $unreleasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', false)->get();
        } else {
            $releasedGalleries = collect(); // Kosongkan jika tidak ada event
            $unreleasedGalleries = collect();
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
            // 'id_event' => 'required',
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
        $galleries = Gallery::where('id_event', $id_event)->latest()->paginate(10);
        $releasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', true)->get();
        $unreleasedGalleries = Gallery::where('id_event', $id_event)->where('is_released', false)->get();

        return view('admin.galeri.index', [
            'title' => 'Gallery - IKBKSY',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
