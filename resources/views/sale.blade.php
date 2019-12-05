@extends('template')
@section('titulo', 'Vendas')
@section('conteudo')
<div class="row">
    <div class="col s10">
        <a href="{{route('sale.create')}}" class="btn-small teal lighten-2 white-text right">Cadastrar Nova Venda</a>
    </div>        
</div>
<div class="row">
    <div class="col s12" id="page">
        @if (count($sale)>0)
        <table>
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Desconto</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale as $s)
                    @php
                        $fmt = numfmt_create( 'pt_BR', NumberFormatter::CURRENCY );
                        $valor = numfmt_format_currency($fmt, $s->salesProduct->price, "BRL");
                        $total = numfmt_format_currency($fmt, $s->sales_amount, "BRL");
                        $desconto = numfmt_format_currency($fmt, $s->discount, "BRL");
                    @endphp
                    <tr>
                        <td>{{$s->salesCustomer->name}}</td>
                        <td>{{$s->salesProduct->name}}</td>
                        <td>{{$valor}}</td>
                        <td>{{$s->quantity}}</td>
                        <td>{{$desconto}}</td>
                        <td>{{$total}}</td>
                        <td>{{$s->salesStatus->name}}</td>
                        <td><a href="{{route('sale.edit', $s->id)}}">Editar</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        @else
            <h3 class="center">Não Há Vendas Cadastradas</h3>
        @endif
    </div>
</div>
@endsection