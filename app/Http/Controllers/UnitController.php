<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $departments = Department::pluck('dep_name', 'dep_id');
        $users = User::pluck('fullname', 'username');
        return view('units.create', compact('departments', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|unique:units',
            'dep_id' => 'required',
            'username' => 'required',
        ]);

        Unit::create([
            'unit_name' => $request->input('unit_name'),
            'dep_id' => $request->input('dep_id'),
            'owner' => $request->input('username'),
        ]);

        session()->flash('success', 'Unit created successfully.');

        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
