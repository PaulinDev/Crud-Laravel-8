@extends('layouts.crud')
@section('lista-carro')
    <h3 class="text-center">Lista de Carros</h3>
    @csrf
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th>#</th>
            <th>Carro</th>
            <th>Marca</th>
            <th>Ano</th>
            <th>Proprietário</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carros as $carro)
            <tr>
                <td>{{$carro->id}}</td>
                <td class="nome-{{$carro->id}}">{{$carro->modelo}}</td>
                <td>{{$carro->marca}}</td>
                <td>{{$carro->ano}}</td>
                <td>
                    {{$carro->relcarros->name}}
                </td>
                <td><a href="{{route('visualizar', $carro->id)}}"><i class="fas fa-eye"></i></a><a
                        href="{{route('editar', $carro->id)}}"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{route('deletar', $carro->id)}}" class="apagar" id="{{$carro->id}}"><i
                            class="fas fa-trash-alt"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h3 class="text-center">Cadastro de Carros</h3>
    <a href="criar">Criar carro</a>
@endsection
