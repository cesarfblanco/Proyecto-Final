<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   

     //La propiedad fillable es para visualizar los campos de la tabla en las consultas sql
    protected $fillable = [
        'name',
        'apellido',
        'FechaNac',
        'email',
        'password',
        'tlf',
        'role'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeClientes($query){
        return $query->where('role','clientes');

    }

    public function scopeEntrenadores($query){
        return $query->where('role','entrenadores');

    }
}
