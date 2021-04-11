@extends('layouts.carros')
@section('edita-criar')

    <h2>Cadastro de carro</h2>
    @if(isset($errors) && count($errors) > 0)
        <div class="col-12 mx-auto text-center alert-danger">
            @foreach($errors->all() as $erro)

                {{$erro}} <br/>

            @endforeach
        </div>
    @endif
    <form class="row g-3" method="POST" action="{{route('car.new.model')}}">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" name="user">

                <option selected>Escolha um usuário</option>
                @foreach($usuarios as $user)
                    <option
                        value="{{isset($usuarios) ? $user->id : $carro->relcarros->id}}">{{isset($usuarios) ? $user->name : $carro->relcarros->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Modelo</label>
            <input type="text" name="modelo" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputAddress2" class="form-label">Ano</label>
            <input type="text" name="ano" class="form-control" id="inputAddress2" placeholder="Ano">
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Criar</button>
        </div>
    </form>
@endsection
