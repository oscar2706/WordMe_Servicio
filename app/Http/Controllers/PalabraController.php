<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Palabra;
use App\Definicion;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PalabraController extends Controller
{
    public function index()
    {
        return Palabra::all();
    }

    public function show($palabra)
    {
        $palabraBuscada = Palabra::where('nombre', '=', $palabra)->first();
        if(is_object($palabraBuscada))
            return $palabraBuscada;
        else
            return response()->json(null, 404);
    }

    public function store(Request $request)
    {
        if (Palabra::where('nombre', '=', $request->input('nombre'))->exists())
            return response()->json(Palabra::where('nombre', '=', $request->input('nombre'))->first(), 201);

        else {
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
    }

    public function delete(Palabra $palabra)
    {
        $palabra->delete();

        return response()->json(null, 204);
    }
}
