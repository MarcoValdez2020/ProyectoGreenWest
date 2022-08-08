<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrocanje extends Model
{
    use HasFactory;

    protected $tabla = "centrocanje";

    protected $fillable = [
        'fechaCanje',
        'id_usuario',
        'id_regalo',
    ];

    public $timestamps = false;

    public function regalo(){
        return $this->belongsToMany(regalo::class,'id_regalo');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
}
