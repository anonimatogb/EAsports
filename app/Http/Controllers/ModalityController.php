<?php

namespace App\Http\Controllers;

use App\Models\Modality;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ModalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$modalities = Modality::all();
        return response()->json($modalities);
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
            'name'=> 'required|string|max:100',
            'description' => 'required|string|max:100',
      ]);

        try {
            $modality = Modality::create($validate);
            return response()->json([
                'message' => 'Modality created successfully',
                'modality' => $modality
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create modality'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Modality $modality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modality $modality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modality $modality)
    {
            $validated= $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:255'
        ]);
        try{

        $modality ->update($validated);
        return response()->json([
            'message' => 'Modality updated successfully',
            'modality' => $modality
        ], 200);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to update modality', 'error' => $e -> getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modality $modality)
    {

        try {
            $modality->delete();
            return response()->json(['message' => 'Modality deleted successfully'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Failed to delete modality', 'error' => $e->getMessage()], 500);
        }    }
}
