<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);

        return view('admin.event.index', [
            'title' => 'Event - IKBKSY',
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.event.add-event', [
            'title' => 'Event - IKBKSY',
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'location' => 'required',
            'publication' => 'required|date',
            'description' => 'required',
            'id_category' => 'required',
        ]);

        $slug = Str::slug($request->event);

        Event::create([
            'name' => $request->event,
            'slug' => $slug,
            'location' => $request->location,
            'publication' => $request->publication,
            'description' => $request->description,
            'id_category' => $request->id_category,
        ]);

        if ($request->source === 'addGelleryPage') {
            return redirect()->route('addGallery')->with('success', 'Success add event !');
        } else {
            return redirect()->to('event')->with('success', 'Success add event !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $categories = Category::all();
        $event = Event::find($id);

        return view('admin.event.edit-event', [
            'title' => 'Edit Your Blog - IKBKSY',
            'categories' => $categories,
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'event' => 'required',
            'location' => 'required',
            'publication' => 'required|date',
            'description' => 'required',
            'id_category' => 'required',
        ]);

        $event = Event::find($id);

        // Slug
        $slug = Str::slug($request->event);

        // Update data
        $event->name = $request->event;
        $event->slug = $slug;
        $event->location = $request->location;
        $event->publication = $request->publication;
        $event->description = $request->description;
        $event->id_category = $request->id_category;

        // Simpan perubahan
        $event->save();

        return redirect()->route('event')->with('success', 'Success update blog !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->to('event')->with('success', 'Success delete your event !');
    }
}
