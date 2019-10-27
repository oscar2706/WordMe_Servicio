<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Palabra;

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
        $palabra = Palabra::create($request->all());

        return response()->json($palabra, 201);
    }

    public function delete(Palabra $palabra)
    {
        $palabra->delete();

        return response()->json(null, 204);
    }
}
