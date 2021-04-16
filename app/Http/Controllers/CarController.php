<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use App\Http\Validate;

class CarController extends Controller implements Validate\validateRequest
{

    public function validateController($request)
    {
        $request->validate([
            'user' => 'required|gt:0',
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required|min:4',
        ],
            [
                'user.required' => 'Por favor, selecione um usuário',
                'user.gt' => 'Você não selecionou o usuário',
                'modelo.required' => 'Digite o modelo do carro',
                'marca.required' => 'Digite a marca do carro',
                'ano.required' => 'Digite o ano do carro',
                'ano.min' => 'Digite o ano no formato XXXX'
            ]
        );

        return true;
    }

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

    public function new(Request $request)
    {
        if ($this->validateController($request)) {
            $carro = new Carro();
            $carro->modelo = $request->modelo;
            $carro->marca = $request->marca;
            $carro->ano = $request->ano;
            $carro->user_id = $request->user;
            $carro->save();
            return redirect()->route('car.get.view');
        }
    }

    public function edit($id, Request $request)
    {
        if ($this->validateController($request)) {
            $carro = carro::find($id);
            $carro->modelo = $request->modelo;
            $carro->marca = $request->marca;
            $carro->ano = $request->ano;
            $carro->user_id = $request->user;
            $carro->save();
            return redirect()->route('car.get.view');
        }
    }

    public function delete($id)
    {
        $carro = carro::find($id);
        $carro->delete();
        return redirect()->route('car.get.view');
    }

}
