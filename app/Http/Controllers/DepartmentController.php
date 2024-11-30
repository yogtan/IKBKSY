<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::latest()->paginate(10);

        return view('admin.struktur.department.index', [
            'title' => 'Department - IKBKSY',
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('admin.struktur.department.add-department', [
            'title' => 'Department - IKBKSY',
            'departments' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'newDepartment' => 'required',
        ]);

        Department::create([
            'sector' => $request->newDepartment,
        ]);

        if ($request->source === 'addPengurusPage') {
            return redirect()->route('addPengurus')->with('success', 'Success add new data department !');
        } else {
            return redirect()->route('department')->with('success', 'Success add new data department !');
        }
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
        $department =  Department::find($id);

        return view('admin.struktur.department.edit-department', [
            'title' => 'Edit Department - IKBKSY',
            'departments' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'sector' => 'required',
        ]);

        $department = Department::find($id);

        $department->sector = $request->sector;

        $department->save();

        return redirect()->route('department')->with('success', 'Success edit department !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departments = Department::find($id);
        $departments->delete();

        return redirect()->route('department')->with('success', 'Success delete department !');
    }
}
