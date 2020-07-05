<?php

namespace App;

require_once 'vendor/autoload.php';

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $guarded  = [];
    protected $id;
    protected $table = 'cotizacion';

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}


