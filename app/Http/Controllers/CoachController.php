<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coachs = Coach::all();
        return response()->json($coachs);
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
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'cpf' => 'required|string|unique:coaches,cpf',
            'rg' => 'required|string|unique:coaches,rg'
        ]);

        try {
            $couch = Coach::create($validate);
            return response()->json([
                'message' => 'Coach created successfully',
                'coach' => $couch
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create coach'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coach $coach)
    {
        $validated= $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
            'height' => 'sometimes|required|numeric',
            'weight' => 'sometimes|required|numeric',
            'cpf' => 'sometimes|required|string|unique:coaches,cpf,' . $coach->id,
            'rg' => 'sometimes|required|string|unique:coaches,rg,' . $coach->id
        ]);
        try{

        $coach ->update($validated);
        return response()->json([
            'message' => 'Coach updated successfully',
            'coach' => $coach
        ], 200);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to update coach', 'error' => $e -> getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coach $coach)
    {
        //
    }
}
