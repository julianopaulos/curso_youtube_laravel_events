<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;
    //seta a maneira que deve ser salvo o campo no banco
    protected $casts = [
        'items' => 'array',
    ];
}
