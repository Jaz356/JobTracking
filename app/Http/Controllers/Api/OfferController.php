<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Work = Work::all();
       return response ()->json($Work, 200);
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
        $Work = Work::create([
            'company' => $request->entry,
            'workapply' => $request->joboffers
        ]);
        $Work->save();
        return response()->json($Work, 200);
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
        $work = Work::find($id);

        $work->update([
            'company' => $request->entry,
            'workapply' => $request->joboffers
        ]);

        $work->save();
        return response()->json($work, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $work = Work::find($id);
        $work->delete();

    }
}
