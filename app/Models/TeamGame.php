<?php
// Tabla intermedia entre team y game
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamGame extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'game_id'];

//Relacion Muchos a uno con game
public function game()
{
    return $this->belongsTo(Game::class);
}


//Relacion Muchos a uno con team
public function team()
{
    return $this->belongsTo(Team::class);
}

}
