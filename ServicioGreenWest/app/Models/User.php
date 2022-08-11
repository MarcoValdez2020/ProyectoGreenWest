<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuario";
    protected $primaryKey = "id_usuario";
    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'correo',
        'id_cuenta'
    ];

    public $timestamps = false;

    public function cuenta(){
        return $this->belongsTo(Cuenta::class,'id_cuenta');
    }

    public function direccion(){
        return $this->hasOne(Direccion::class,'id_usuario');
    }

    public function contenedores(){
        return $this->hasMany(Contenedor::class,'id_usuario');
    }

    public function canje(){
        return $this->hasMany(centrocanje::class,'id_usuario');
    }
}
