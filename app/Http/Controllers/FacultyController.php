<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::pluck('dep_name', 'dep_id');
        // $users = User::pluck('fullname', 'username');
        return view('faculties.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fac_name' => 'required',
            'dep_id' => 'required',
        ]);

        Faculty::create([
            'fac_name' => $request->input('fac_name'),
            'dep_id' => $request->input('dep_id'),
        ]);

        session()->flash('success', 'Faculty created successfully.');

        return redirect()->route('faculties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        $departments = Department::pluck('dep_name', 'dep_id');
        return view('faculties.edit', compact('faculty', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $faculty->update($request->all());

        session()->flash('success', 'Faculty updated successfully.');

        return redirect()->route('faculties.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        //
    }
}
