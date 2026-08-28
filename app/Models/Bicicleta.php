<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bicicleta extends Model
{
    use Hasfactory;
    
    protected $fillable = [
        'marca',
        'modelo',
        'preco'
    ];
}
