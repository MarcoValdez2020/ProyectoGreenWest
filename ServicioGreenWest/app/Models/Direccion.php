<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = "direccion";
    protected $primaryKey = "id_direccion";
    protected $fillable = [
        'estado',
        'municipio',
        'calle',
        'numero_exterior',
        'numero_interno',
        'id_usuario'
    ];

    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
}
