@extends('template')
@section('titulo', 'Produtos')
@section('conteudo')
<div class="row">
    <div class="col s10">
        <a href="{{route('product.create')}}" class="btn-small teal lighten-2 white-text right">Cadastrar Novo Produto</a>
    </div>        
</div>
<div class="row">
    <div class="col s12" id="page">
        @if (count($product)>0)
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    @php
                        $fmt = numfmt_create( 'pt_BR', NumberFormatter::CURRENCY );
                        $price = numfmt_format_currency($fmt, $p->price, "BRL");
                    @endphp
                    <tr>
                        <td>{{$p->name}}</td>
                        <td>{{$p->description}}</td>
                        <td>{{$price}}</td>
                        <td><a href="{{route('product.edit', $p->id)}}">Editar</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
            <h3 class="center">Não Há Produtos Cadastrados</h3>
        @endif
    </div>
</div>
@endsection