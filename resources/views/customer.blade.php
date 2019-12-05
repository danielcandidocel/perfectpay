@extends('template')
@section('titulo', 'Clientes')
@section('conteudo')
<div class="row">
    <div class="col s10">
        <a href="{{route('customer.create')}}" class="btn-small teal lighten-2 white-text right">Cadastrar Novo Cliente</a>
    </div>        
</div>
<div class="row">
    <div class="col s12" id="page">
        @if (count($customer)>0)
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $c)                   
                    <tr>
                        <td>{{$c->name}}</td>
                        <td>{{$c->email}}</td>
                        <td><a href="{{route('customer.edit', $c->id)}}">Editar</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
            <h3 class="center">Não Há Clientes Cadastrados</h3>
        @endif
    </div>
</div>
@endsection