<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];

    public function definicions()
    {
        return $this->hasMany('App\Definicion');
    }
}
