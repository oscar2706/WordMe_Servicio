<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista;
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
        return Lista::create($request->all());
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
