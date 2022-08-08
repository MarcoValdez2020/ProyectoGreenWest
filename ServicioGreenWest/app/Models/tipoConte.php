<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoConte extends Model
{
    use HasFactory;

    protected $tabla = "tipocontenedor";

    protected $fillable = [
        'tipoContenedor',
        'puntos'
    ];

    public $timestamps = false;

    public function tipocontenedor(){
        return $this->hasMany(Contenedor::class,'id_tipoConte');
    }
}
