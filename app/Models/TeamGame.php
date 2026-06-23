<?php
// Tabla intermedia entre team y game
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TeamGame extends Model
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
