<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
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

    protected $fillable = ['date', 'status', 'local_goals', 'away_goals'];
    public function teams()
    {
        // relacion de muchos 
        return $this->belongsToMany(Team::class, 'team_games');
    }

    public function goals()
    {   
        // relacion de uno a muchos 
        return $this->hasMany(Goal::class);
    }

    public function teamGames()
    {
        return $this->hasMany(TeamGame::class);
    }
}
