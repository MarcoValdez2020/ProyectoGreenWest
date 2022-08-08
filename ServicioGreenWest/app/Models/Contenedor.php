<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model
{
    use HasFactory;

    protected $tabla = "contenedor";

    protected $fillable = [
        'capacidad',
        'estadoContenedor',
        'id_usuario',
        'id_tipoConte'
    ];

    public $timestamps = false;

    public function tipoconte(){
        return $this->belongsTo(tipoConte::class,'id_tipoConte');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
}
