<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliar extends Model
{
    use HasFactory;

    protected $table = 'avaliar';

    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'fabrica_id',
        'categorizacao',
        'validade',
        'relevancia',
        'acertibilidade'
    ];
}
