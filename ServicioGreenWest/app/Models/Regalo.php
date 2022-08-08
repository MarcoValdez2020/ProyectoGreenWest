<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    use HasFactory;
    protected $tabla = "regalo";

    protected $fillable = [
        'nombre',
        'imagen',
        'costePuntos',
        'cantidad',
    ];

    public $timestamps = false;

    public function canje(){
        return $this->hasMany(centrocanje::class,'id_regalo');
    }
}
