<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'player_id', 'game_id'];
    public function player()
    {
        // relacion muchos a uno

        return $this->belongsTo(Player::class);
    }

    public function game()

    {   
        // relacion muchos a uno
        return $this->belongsTo(Game::class);
    }
}
