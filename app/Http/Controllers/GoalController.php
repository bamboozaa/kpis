<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // foreach ($_GET as $key => $value) {
        //     {$key} => {$value}
        // }
        // $goals = Goal::where('user_id', $id)->get();
        $goals = Goal::where('user_id', Auth::user()->id)->get();
        // $goals = $goals[0];
        return view('goals.create', compact('goals'));
        // return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'goal' => 'required|unique:goals',
        ]);

        Goal::create($request->all());

        // Goal::create([
        //     'user_id' => $request->input('user_id'),
        //     'goal' => $request->input('goal'),
        // ]);

        session()->flash('success', 'Goal created successfully.');

        return redirect()->route('goals.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        $goal->update($request->all());

        session()->flash('success', 'Goal updated successfully.');

        return redirect()->route('goals.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();

        session()->flash('success', 'Goal deleted successfully.');

        return redirect()->route('goals.create');
    }
}