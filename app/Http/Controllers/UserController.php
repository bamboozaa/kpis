<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use App\Models\Faculty;
use App\Models\User_Faculty;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display a list of users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Display a specific user
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Show the form to edit a user
        // $user = User::findOrFail($id);
        $faculties = Faculty::orderBy('fac_name')->pluck('fac_name', 'fac_id');
        return view('users.edit', compact('user', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Update a user
        // $user = User::findOrFail($id);

        // dd($request);

        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email,' . $user->id,
            // Add other validation rules as needed
        ]);

        $user->update([
            'position' => $request->input('position'),
            'dep_id' => $request->input('dep_id'),
            // 'unit_id' => $request->input('unit_id'),
            // Update other fields as needed
        ]);

        User_Faculty::updateOrCreate([
            'user_id' => $request->input('user_id'),
            'fac_id' => $request->input('fac_id'),
        ]);

        session()->flash('success', 'User update successfully.');

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
