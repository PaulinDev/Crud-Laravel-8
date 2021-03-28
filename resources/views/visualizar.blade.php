@extends('layouts.crud')
@section('ver')
    <h4 class="text-center">Dados do carro</h4>
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th>#</th>
            <th>Carro</th>
            <th>Marca</th>
            <th>Ano</th>
        </tr>
        </thead>
        <tbody>
        <td>{{$carros->id}}</td>
        <td>{{$carros->modelo}}</td>
        <td>{{$carros->marca}}</td>
        <td>{{$carros->ano}}</td>
        </tbody>
    </table>
    <h4 class="text-center">Dados do Proprietário</h4>
    <table class="table">
        <thead>
        <tr class="table-dark">
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>
        </thead>
        <tbody>
            <td> {{$carros->relcarros->id}} </td>
            <td> {{$carros->relcarros->name}} </td>
            <td> {{$carros->relcarros->email}} </td>
        </tbody>
    </table>

@endsection
