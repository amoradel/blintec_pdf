<?php

namespace App;

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $guarded  = [];

    protected $table = 'cotizacion';
}


