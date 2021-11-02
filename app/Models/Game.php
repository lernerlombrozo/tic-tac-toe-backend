<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dimension',
        'size',
        'player1',
        'player2',
        'currentTurn',
        'winner',
        'board',
    ];
}
