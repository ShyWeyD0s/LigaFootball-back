<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
  
    
    // todos los juegos con sus respectivos goles y el jugador que anoto cada gol en la ruta /games2
    public function index()
    {
        $games = Game::with('goals.player')->get();
        return $games;
    }


    public function store(Request $request)
    {
        $item = Game::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Game::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Game::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Game::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
