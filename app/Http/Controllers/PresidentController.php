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

    public function store(Request $request)
    {
        $item = President::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = President::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = President::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
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
