@extends('template')
@section('titulo', 'Relatórios')
@section('conteudo')
<div class="row">
    <div class="col s12" id="page">
        @if (count($report)>0)
        <table>
            <thead>
                <tr>
                    <th>Status</th>                    
                    <th>Quantidade</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $r)
                   @php
                        $fmt = numfmt_create( 'pt_BR', NumberFormatter::CURRENCY );
                        $total = numfmt_format_currency($fmt, $r['total'], "BRL");
                    @endphp
                    <tr>
                       <td>{{$r['name']}}</td> 
                       <td>{{$r['quantidade']}}</td> 
                       <td>{{$total}}</td> 
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