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

    public function login(Request $request, $email)
    {
        $usuario = Usuario::where([
            ['email', '=', $email],
            ['password', '=', $request->input('password')]
            ])->first();
        if(is_object($usuario))
            return response()->json(true, 200);
        else
            return response()->json(false, 200);
    }

    public function idUsuario(Request $request)
    {
        $id = DB::table('usuarios')->select('id')->where([
            ['email', '=', $request->input('email')],
            ['password', '=', $request->input('password')]
        ])->get();

        return $id;
    }
}
