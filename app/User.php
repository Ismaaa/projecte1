<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surnames', 'dni', 'email', 'city', 'address', 'phone', 'admin', 'bio', 'avatar', 'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin; // Retornem la columna admin de la taula
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function pdfs()
    {
        return $this->hasMany(Pdf::class);
    }

    public function suggeriments()
    {
        return $this->hasMany(Suggeriment::class);
    }

}
