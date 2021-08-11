<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quiz_id',
        'categoria_id',
        'pergunta_id',
        'marcada'
    ];
}
