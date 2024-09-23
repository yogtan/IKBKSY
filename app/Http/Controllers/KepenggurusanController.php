<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KepenggurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);

        return view('about.pengurus', [
            'title' => 'Pengurus - IKBKSY',
            'members' => $members,
        ]);
    }

    /**
     * Display a listing of the resource on admin.
     */
    public function all()
    {
        $members = Member::latest()->paginate(10);
        // $members = Member::with('department')->get();

        return view('admin.struktur.pengurus.index', [
            'title' => 'Data Struktur Pengurus - IKBKSY',
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('admin.struktur.pengurus.add-struktur', [
            'title' => 'Add New Pengurus - IKBKSY',
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
        $fileName = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('Struktur Organisasi', $fileName);

        Member::create([
            'name' => $request->name,
            'image' => $image,
            'id_department' => $request->id_department,
            'position' => $request->position,
        ]);

        return redirect()->route('allPengurus')->with('success', 'Success add new data !');
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
        $member = Member::find($id);
        $departments = Department::all();

        return view('admin.struktur.pengurus.edit-struktur', [
            'title' => 'Edit Data Pengurus - IKBKSY',
            'member' => $member,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'id_department' => 'required',
            'position' => 'required',
        ]);

        $member = Member::find($id);

        // Cek file gambar baru apakah diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                Storage::disk('public')->delete($member->image);
            }

            //Simpan gambar baru
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $image = $request->image->storeAs('Struktur Organisasi', $fileName);
            $member->image = $image;
        }

        // Update data
        $member->name = $request->name;
        $member->id_department = $request->id_department;
        $member->position = $request->position;

        // Save perubahan data
        $member->save();

        return redirect()->route('allPengurus')->with('success', 'Success edit data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);

        if ($member) {
            // Cek apakah ada gambar user
            if ($member->image && Storage::disk('public')->exists($member->image)) {
                // Hapsu jika ada
                Storage::disk('public')->delete($member->image);
            }

            // Hapus data user
            $member->delete();
        }

        return redirect()->route('allPengurus')->with('success', 'Success delete data !');
    }
}
