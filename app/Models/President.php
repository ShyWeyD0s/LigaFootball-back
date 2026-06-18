<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class President extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'team_id'];

    public function team()
    {   
        // relacion uno a uno
        return $this->belongsTo(Team::class);
    }
}
