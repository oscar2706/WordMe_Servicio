<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];

    protected $hidden = ['pivot'];
    protected $with = ['definicions'];

    public function definicions()
    {
        return $this->hasMany('App\Definicion');
    }

    public function listas()
    {
        return $this->belongsToMany('App\Lista');
    }

    public function usuarios()
    {
        return $this->belongsToMany('App\Usuario');
    }
}
