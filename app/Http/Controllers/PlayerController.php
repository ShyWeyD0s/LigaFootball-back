<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    //consulta eloquent todos los jugadores
    public function index()
    {
        $players = Player::all();
        return $players;
    }

    public function store(Request $request)
    {
        $item = Player::create($request->all());
        return response()->json($item, 201);
    }

    public function show($id)
    {
        $item = Player::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        return response()->json($item);
    }

    public function update(Request $request, $id)
    {
        $item = Player::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->update($request->all());
        return response()->json($item);
    }

    public function destroy($id)
    {
        $item = Player::find($id);
        if (!$item) return response()->json(['message' => 'Not found'], 404);
        $item->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
