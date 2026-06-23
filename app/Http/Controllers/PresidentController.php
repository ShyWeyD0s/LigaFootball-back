<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\President;

class PresidentController extends Controller
{
    public function index()
    {
        $presidents = President::with('team')->get();
        return $presidents;
    }
    //store de presidente
    public function store(Request $request)
    {
        $request->validate([ //reglas de validacion para store por su relacion 1 a 1
            'name' => 'required|string',
            'year' => 'required|date',
            'team_id' => 'required|exists:teams,id|unique:presidents,team_id'
        ]);

        $item = President::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id) //presidente: mostrar un presidente por id
    {
        $item = President::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = President::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);

        $request->validate([ // reglas de validacion para update
            'name' => 'sometimes|required|string',
            'year' => 'sometimes|required|date',
            'team_id' => 'sometimes|required|exists:teams,id|unique:presidents,team_id,' . $item->id
        ]);

        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = President::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
