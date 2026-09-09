<?php

namespace App\Http\Controllers;

use App\Models\Ranking;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$rankings = Ranking::all();
        return response()->json($rankings);
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
        $validate = $request->validate([
            'position'=> 'required|string|max:100',
            'name_competitor' => 'required|string|max:100',
            'name_coach' => 'required|string|max:100'
        ]);

        try {
            $ranking = Ranking::create($validate);
            return response()->json([
                'message' => 'Ranking created successfully',
                'ranking' => $ranking
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create ranking'], 500);
        }
    }

    /**
     * Display the specified resource.
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ranking $ranking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ranking $ranking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ranking $ranking)
    {
            $validated= $request->validate([
            'position' => 'sometimes|required|string|max:255',
            'name_competitor' => 'sometimes|required|string|max:255',
            'name_coach' => 'sometimes|required|string|max:255'

        ]);
        try{

        $ranking ->update($validated);
        return response()->json([
            'message' => 'Ranking updated successfully',
            'ranking' => $ranking
        ], 200);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to update ranking', 'error' => $e -> getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ranking $ranking)
    {
        //
    }
}
