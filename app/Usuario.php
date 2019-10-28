<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'password', 'email'
    ];

    protected $hidden = [
        'password'
    ];

    public function listas()
    {
        return $this->hasMany('App\Lista');
    }
}
