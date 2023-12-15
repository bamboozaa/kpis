<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndicatorController extends Controller
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
        $indicators = Indicator::where('user_id', Auth::user()->id)->get();
        $goals = Goal::where('user_id', Auth::user()->id)->get()->pluck('goal', 'goa_id');
        return view('indicators.create', compact('goals', 'indicators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'indicator' => 'required',
            'weight' => 'required',
            'goa_id' => 'required',
        ]);

        $goa_id = $request->input('goa_id');

        Indicator::create($request->all());

        session()->flash('success', 'Indicator created successfully.');

        return redirect()->route('goals.show', $goa_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Indicator $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indicator $indicator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indicator $indicator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indicator $indicator)
    {
        $indicator->delete();

        session()->flash('success', 'Indicator deleted successfully.');

        return redirect()->back();
    }
}
