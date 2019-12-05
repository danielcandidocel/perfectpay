@extends('template')
@section('titulo', 'Editar Produto')
@section('conteudo')
<div class="row center">
        <div class="col s2"></div>
        <div class="col s6">
            <h6 class="center">Editar Produto</h6>
            <form class="col s12" method="POST" action="{{route('saleUpdate', $sale->id)}}">
            @csrf                
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        @php
                            $fmt = numfmt_create( 'pt_BR', NumberFormatter::CURRENCY );
                            $total = numfmt_format_currency($fmt, $sale->sales_amount, "BRL");
                        @endphp
                        <tr>
                            <td>{{$sale->salesCustomer->name}}</td>
                            <td>{{$sale->salesProduct->name}}</td>
                            <td>{{$total}}</td>
                            <td>
                                <select id="status" name="status" >
                                    <option value=""></option>
                                    @foreach($status as $s)
                                        <option value="{{$s->id}}" @if($s->id == $sale->id_status) selected @endif>{{$s->name}}</option>
                                    @endforeach
                                </select>
                                <label for="status">Status</label>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="red-text text-darken-1">{{$errors->first('status')}}</strong>
                                    </span>
                                @endif
                            </td>
                        </tr>                        
                    </tbody>
                </table>          
            <button type="submit" class="btn black text-white left">Salvar</button>
            </form>
        </div>
    </div>
@endsection