<?php

namespace App\Http\Controllers\Api;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
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
            'company' => $request->company,
            'workapply' => $request->workapply,
            'url' => $request->url,
            'status' => $request->status,
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
        $Work = Work::find($id);
        return response ()->json($Work, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
   //  public function edit(string $id)
    // {
        //
  //  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $work = Work::find($id);

        $work->update([
            'company' => $request->company,
            'workapply' => $request->workapply,
            'url' => $request->url,
            'status' => $request->status,
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
