<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'usuario_id'
    ];

    protected $with = ['palabras'];

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function palabras()
    {
        return$this->belongsToMany('App\Palabra');
    }
}
