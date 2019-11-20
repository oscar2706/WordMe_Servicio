<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{

    public function index()
    {
        return Usuario::all();
    }

    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    public function store(Request $request)
    {
        return Usuario::create($request->all());
    }

    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where([
            ['email', '=', $request->input(('email'))],
            ['password', '=', $request->input('password')]
            ])->first();
        if(is_object($usuario))
            return response()->json($usuario->id, 200);
        else
            return response()->json(null, 404);
    }
}
