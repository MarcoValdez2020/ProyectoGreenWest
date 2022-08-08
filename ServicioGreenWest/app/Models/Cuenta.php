<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $tabla = "cuenta";

    protected $fillable = [
        'usuario',
        'password',
        'puntos',
        'rol',
    ];

    public function usuario(){
        return $this->hasOne(User::class,'id_cuenta');
    }

    public $timestamps = false;


}
