<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

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
