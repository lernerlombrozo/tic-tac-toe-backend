<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'winner',
        'players',
        'currentTurn'
    ];

    public function room()
    {
        return $this->hasOne(Room::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
