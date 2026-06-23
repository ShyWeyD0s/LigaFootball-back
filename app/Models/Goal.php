<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Goal extends Model
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

    protected $fillable = ['name', 'description', 'player_id', 'game_id'];// Protección contra Asignación Masiva
    public function player() // relacion muchos a uno
    {
        return $this->belongsTo(Player::class);
    }

    public function game()

    {   
        // relacion muchos a uno
        return $this->belongsTo(Game::class);
    }
}
