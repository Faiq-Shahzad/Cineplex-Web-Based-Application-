<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $table = "movies";
    protected $fillable = [
        'movie_id',
        'user_id',
        'movie_seats',
        'show_id',
    ];
}
