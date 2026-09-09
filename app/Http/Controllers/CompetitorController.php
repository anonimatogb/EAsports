<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CompetitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$competitors = Competitor::all();
        return response()->json($competitors);}

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
             'name' => 'required|string|max:100',
             'age' => 'required|integer',
             'height' => 'required|numeric',
             'weight' => 'required|numeric',
             'gender' => 'required|string|max:10',
             'cpf' => 'required|string|unique:competitors,cpf',
             'rg' => 'required|string|unique:competitors,rg',
             'team' => 'required|string|max:10'
      ]);

        try {
            $couch = Competitor::create($validate);
            return response()->json([
                'message' => 'Competitor created successfully',
                'competitor' => $couch
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create competitor'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Competitor $competitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competitor $competitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Competitor $competitor)
    {
            $validated= $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'age' => 'sometimes|required|integer',
            'height' => 'sometimes|required|numeric',
            'weight' => 'sometimes|required|numeric',
            'cpf' => 'sometimes|required|string|unique:competitors,cpf,' . $competitor->id,
            'rg' => 'sometimes|required|string|unique:competitors,rg,' . $competitor->id,
            'team' => 'sometimes|required|string|max:100'
        ]);
        try{

        $competitor ->update($validated);
        return response()->json([
            'message' => 'Competitor updated successfully',
            'competitor' => $competitor
        ], 200);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to update competitor', 'error' => $e -> getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competitor $competitor)
    {
        //
    }
}
