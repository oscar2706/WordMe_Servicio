<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{

    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        return Usuario::create($request->all());
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
            return response()->json(false, 404);
    }
}
