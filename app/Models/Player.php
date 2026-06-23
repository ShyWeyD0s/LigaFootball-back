<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Player extends Model
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

    protected $fillable = ['name', 'position', 'team_id'];
    public function team()  
    {
        // relacion muchos a uno
        return $this->belongsTo(Team::class);
    }

    public function goals()
    {   
        // relacion de uno a muchos 
        return $this->hasMany(Goal::class);
    }
}
