<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use Illuminate\Http\Request;

class KepenggurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();

        return view('about.pengurus', [
            'title' => 'Pengurus - IKBKSY',
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $members = Member::all();
        $departments = Department::all();

        return view('about.addPengurus', [
            'title' => 'Add New Pengurus - IKBKSY',
            'members' => $members,
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg|max:2048',
            'id_department' => 'required',
            'position' => 'required',
        ]);

        // // Menyimpan gambar
        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);

        $fileName = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('Struktur Organisasi', $fileName);

        Member::create([
            'name' => $request->name,
            'image' => $image,
            'id_department' => $request->id_department,
            'position' => $request->position,
        ]);

        return redirect()->route('pengurusIKBKSY');
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
