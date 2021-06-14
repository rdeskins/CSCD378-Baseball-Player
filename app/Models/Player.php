<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'team',
        'jersey_number',
        'position',
        'age'
    ];

    protected $sortable = [
        'first_name',
        'last_name',
        'team',
        'age'
    ];

    public function games() {
        return $this->hasMany(Game::class);
    }
}
