<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
protected $table = 'locality';

protected $fillable = [
'street',
'neighborhood',
'number',
'zip_code',
'city',
'state',
'country'
];

}
