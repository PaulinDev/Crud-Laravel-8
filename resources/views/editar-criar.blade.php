@extends('layouts.crud')
@section('edita-criar')

    @if(isset($usuarios))
        <h2>Cadastro de carro</h2>
        <form class="row g-3" method="POST" action="{{route('cria')}}">
            @csrf
            @method('PUT')

            @else
                <h2>Editar carro</h2>
                <form class="row g-3" method="POST" action="{{route('edit',['id' => $carro->id])}}">
                    @csrf

                    @endif
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="user">

                            @if(isset($usuarios))
                                <option selected>Escolha um usuário</option>
                                @foreach($usuarios as $user)
                                    <option value="{{isset($usuarios) ? $user->id : $carro->relcarros->id}}">{{isset($usuarios) ? $user->name : $carro->relcarros->name}}</option>
                                @endforeach
                            @else
                                <option value="{{$carro->relcarros->id}}">{{$carro->relcarros->name}}</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="inputEmail4"
                               value="{{isset($usuarios) ? '' : $carro->modelo}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" id="inputEmail4"
                               value="{{isset($usuarios) ? '' : $carro->marca}}">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress2" class="form-label">Ano</label>
                        <input type="text" name="ano" class="form-control" id="inputAddress2" placeholder="Ano"
                               value="{{isset($usuarios) ? '' : $carro->ano}}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                </form>
@endsection
