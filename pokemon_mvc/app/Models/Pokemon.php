<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pokemon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Nome',
        'Altura',
        'Fase Evolutíva',
        'É da primeira geração?',
        'Geração',
    ];
}
