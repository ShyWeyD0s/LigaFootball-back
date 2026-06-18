<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stadium', 'city', 'founding_date'];

    public function players()

    {
        //relacion uno a muchos
        return $this->hasMany(Player::class);
    }

    public function president()
    {
        //relacion uno a uno
        return $this->hasOne(President::class);
    }

    public function games()

    {
        //relacion muchos a muchos
        return $this->belongsToMany(Game::class, 'team_games');
    }

    public function teamGames()
    {
        return $this->hasMany(TeamGame::class);
    }
}

