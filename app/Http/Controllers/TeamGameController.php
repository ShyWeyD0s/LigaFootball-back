<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamGame;

class TeamGameController extends Controller
{
  
    public function index()
    {
        $teamGames = TeamGame::with('team', 'game')->get();
        return $teamGames;
    }
    
    public function store(Request $request)
    {
        $item = TeamGame::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = TeamGame::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = TeamGame::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = TeamGame::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
