<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejoEmocional extends Model
{
    use HasFactory;

    protected $table = 'consejos_emocionales';

    protected $fillable = [
        'titulo',
        'descripcion',
    ];
    
}
