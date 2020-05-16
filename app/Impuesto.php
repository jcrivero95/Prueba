<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    
    protected $fillable = ['nombre', 'ambitos_impuestos_id','calculos_impuestos_id','importe','etiqueta'];

}


