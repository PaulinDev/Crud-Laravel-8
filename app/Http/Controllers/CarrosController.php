<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\User;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function index()
    {
        $carros = carro::with('relcarros')->get();
        return view('carros', ['carros' => $carros]);

    }

    public function visualizar($id)
    {
        $carros = carro::with('relcarros')->find($id);
        return view('visualizar', ['carros' => $carros]);
    }

    public function criar(Request $request)
    {
        $carro = new Carro();
        $carro->modelo = $request->modelo;
        $carro->marca = $request->marca;
        $carro->ano = $request->ano;
        $carro->user_id = $request->user;
        $carro->save();
        return redirect()->route('dashboard');
    }

    public function editar($id, Request $request)
    {
        $carro = carro::find($id);
        $carro->modelo = $request->modelo;
        $carro->marca = $request->marca;
        $carro->ano = $request->ano;
        $carro->user_id = $request->user;
        $carro->save();
        return redirect()->route('dashboard');
    }

    public function deletar($id)
    {
        $carro = carro::find($id);
        $carro->delete();
        return redirect()->route('dashboard');
    }
}
