<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    use HasFactory;

    protected $fillable = [
        'pergunta',
        'resposta_a',
        'resposta_b',
        'resposta_c',
        'resposta_d',
        'correta',
        'categoria_id'
    ];
}
