<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    use HasFactory;

    protected $table = 'pontuacao';

    protected $fillable = [
        'user_id',
        'porcentagem',
        'categoria_id',
        'quiz_id'
    ];
}
