<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Palabra;
use App\Definicion;

class PalabraController extends Controller
{
    public function index()
    {
        return Palabra::all();
    }

    public function show(Palabra $palabra)
    {
        return $palabra;
    }

    public function store(Request $request)
    {
        $palabra = Palabra::create([
            'nombre' => $request->input('nombre')
        ]);
        $definiciones = json_decode($request->input('definiciones'));
        foreach($definiciones as $definicion){
            Definicion::create([
                'tipo' => $definicion->tipo,
                'definicion' => $definicion->definicion,
                'palabra_id' => $palabra->id,
            ]);
        }

        return response()->json($palabra, 201);
    }

    public function delete(Palabra $palabra)
    {
        $palabra->delete();

        return response()->json(null, 204);
    }
}
