<?php

namespace App\Http\Controllers;

use App\Http\Requests\Criarcarro;
use App\Models\Carro;
use App\Models\User;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function index()
    {
        $carros = carro::with('relcarros')->get();
        return view('car.car-index', ['carros' => $carros]);

    }

    public function get($id)
    {
        $carros = carro::with('relcarros')->find($id);
        return view('car.car-get', ['carros' => $carros]);
    }

    public function new(Criarcarro $request)
    {
        $carro = new Carro();
        $carro->modelo = $request->modelo;
        $carro->marca = $request->marca;
        $carro->ano = $request->ano;
        $carro->user_id = $request->user;
        $carro->save();
        return redirect()->route('car.get.view');
    }

    public function edit($id, Request $request)
    {
        $carro = carro::find($id);
        $carro->modelo = $request->modelo;
        $carro->marca = $request->marca;
        $carro->ano = $request->ano;
        $carro->user_id = $request->user;
        $carro->save();
        return redirect()->route('car.get.view');
    }

    public function delete($id)
    {
        $carro = carro::find($id);
        $carro->delete();
        return redirect()->route('car.get.view');
    }
}
