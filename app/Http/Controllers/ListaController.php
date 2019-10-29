<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Lista;
use App\Palabra;

class ListaController extends Controller
{
    public function index()
    {
        return Lista::all();
    }

    public function show(Lista $lista)
    {
        return $lista;
    }

    public function store(Request $request)
    {
        return Lista::create($request->all());
    }

    public function storeListaPalabra(Lista $lista, Palabra $palabra)
    {
        if(DB::table('lista_palabra')->insert([
            'lista_id' => $lista->id,
            'palabra_id' =>  $palabra->id
        ]))
            return response()->json(null, 204);
        else
            return response()->json(null, 404);
    }

    public function delete(Lista $lista)
    {
        $lista->delete();
        return response()->json(null, 204);
    }

    public function fromUser($usuario){
        return Lista::where('usuario_id', '=', $usuario)->get();
    }

}
