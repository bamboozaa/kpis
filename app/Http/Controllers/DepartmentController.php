<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all()->sortBy('cost_center');
        // $departments = Department::all()->sortBy(function($item) {
        //     return $item->cost_center;
        // });
        // $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisions = Division::orderBy('div_name')->pluck('div_name', 'div_id');
        return view('departments.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dep_name' => 'required|unique:departments',
        ]);

        Department::create($request->all());

        session()->flash('success', 'Department created successfully.');

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $divisions = Division::orderBy('div_name')->pluck('div_name', 'div_id');
        return view('departments.edit', compact('department', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());

        session()->flash('success', 'Department updated successfully.');

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        session()->flash('success', 'Department deleted successfully.');

        return redirect()->route('departments.index');
    }
}
