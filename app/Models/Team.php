<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Team extends Model
{
    use HasFactory;

    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }

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

