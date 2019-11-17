<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Lista;
use App\Palabra;
use App\Usuario;

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
        if( Usuario::where('id', '=', $request->get('usuario_id'))->exists())
            return Lista::create($request->all());
        else
            return response()->json(null, 404);
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

    public function update(Request $request, Lista $lista)
    {
        if ($lista){
            $lista->update($request->all());
            return response()->json($lista, 200);
        }
        else
            return response()->json(null, 404);
    }

    public function duplicate(Lista $lista)
    {
        $nombre = $lista->nombre;
        $nombre = $nombre . '_copia';

        $lista_duplicada = Lista::create([
            'nombre' => $nombre,
            'usuario_id'=> $lista->usuario_id
        ]);
        foreach ($lista->palabras as $palabra) {
            DB::table('lista_palabra')->insert([
                'lista_id' => $lista_duplicada->id,
                'palabra_id' =>  $palabra->id
            ]);
        }
        return response()->json($lista_duplicada, 200);
    }

    public function delete(Lista $lista)
    {
        DB::table('lista_palabra')->where('lista_id', '=', $lista->id)->delete();
        $lista->delete();
        return response()->json(null, 204);
    }

    public function fromUser($usuario){
        return Lista::where('usuario_id', '=', $usuario)->get();
    }

}
