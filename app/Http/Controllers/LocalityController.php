<?php

namespace App\Http\Controllers;

use App\Models\Locality;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LocalityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$localities = Locality::all();
        return response()->json($localities);
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
            'street'=> 'required|string|max:100',
            'neighborhood' => 'required|string|max:100',
            'number' => 'required|integer',
            'zip_code' => 'required|integer',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100'
      ]);

        try {
            $locality = Locality::create($validate);
            return response()->json([
                'message' => 'Locality created successfully',
                'locality' => $locality
            ], 201);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Failed to create locality'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Locality $locality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Locality $locality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Locality $locality)
    {
            $validated= $request->validate([
            'street' => 'sometimes|required|string|max:100',
            'neighborhood' => 'sometimes|required|string|max:100',
            'number' => 'sometimes|required|integer',
            'zip_code' => 'sometimes|required|integer',
            'city' => 'sometimes|required|string|max:100',
            'state' => 'sometimes|required|string|max:100',
            'country' => 'sometimes|required|string|max:100'
        ]);
        try{

        $locality ->update($validated);
        return response()->json([
            'message' => 'Locality updated successfully',
            'locality' => $locality
        ], 200);
        }catch (QueryException $e) {
            return response()->json(['message' => 'Failed to update locality', 'error' => $e -> getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Locality $locality)
    {
        //
    }
}
