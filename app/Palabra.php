<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palabra extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];

    protected $with = ['definicions'];

    public function definicions()
    {
        return $this->hasMany('App\Definicion');
    }
}
