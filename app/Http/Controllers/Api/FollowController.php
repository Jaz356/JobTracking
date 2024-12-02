<?php

namespace App\Http\Controllers\Api;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $work = Work::get();
        return response()->json($work, 200);   
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
    public function store(Request $request, $workId)
    {
        //
        $validated = $request->validate([
            'news' => 'required|array'
        ]);

        $work = Work::find($workId);

        if (!$work){
            return response()->json([
                'message' => 'POTATOE, POTATO'
                ], 404);
        }

        $followsData = collect($validated['news'])->map(function ($newsItem) use ($work) {
            return [
                'work_id' => $work->id,
                'news' =>  $newsItem,
            ];
        });

        $work->follows()->createMany($followsData);

        return response()->json([
            'message' => 'Correctly Added Details',
            'work' => $work->load('follows'),
            ]);

            $work->save();
            return response()->json($work, 200);

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
        $Work = Work::find($id);

        $Work->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        $Work->save();
        return response()->json($Work, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $Work = Work::find($id);
        $Work->delete();
    }
}