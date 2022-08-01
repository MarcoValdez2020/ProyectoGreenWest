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

    protected $tabla = "users";

    protected $fillable = [
        'name',
        'apellidoPaterno',
        'apellidoMaterno',
        'telefono',
        'email',
        'password',
        'id_rol'
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
