<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{

protected $fillable = [
    'name',
    'age',
    'height',
    'weight',
    'cpf',
    'rg'
];

}
