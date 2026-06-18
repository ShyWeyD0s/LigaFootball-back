<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    //consulta eloquent todos los goles
    public function index()
    {
        $goals = Goal::all();
        return $goals;
    }



    
    public function store(Request $request)
    {
        $item = Goal::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Goal::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Goal::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Goal::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
