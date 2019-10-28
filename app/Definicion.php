<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definicion extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'tipo',
        'definicion',
        'palabra_id'
    ];

    public function palabra()
    {
        return $this->belongsTo('App\Palabra');
    }
}
