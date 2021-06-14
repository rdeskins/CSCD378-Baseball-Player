<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_number',
        'at_bats',
        'runs',
        'hits',
        'walks',
        'runs_batted_in'
    ];
    
    public function player() {
        return $this->belongsTo(Player::class);
    }
}
