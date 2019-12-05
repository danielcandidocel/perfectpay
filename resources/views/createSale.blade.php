@extends('template')
@section('titulo', 'Cadastrar Venda')
@section('conteudo')
<div class="row center">
    <div class="col s2"></div>
    <div class="col s6">
        <h6 class="center">Cadastrar Nova Venda</h6>
        <form class="col s12" method="POST" action="{{route('sale.store')}}">
        @csrf                
            <div class="row">
                <div class="input-field col s8">
                    <select id="customer" name="customer" >
                    @foreach($customers as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                    </select>
                    <label for="customer">Cliente</label>
                    @if ($errors->has('customer'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="red-text text-darken-1">{{$errors->first('customer')}}</strong>
                        </span>
                    @endif
                </div>  
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <select id="product" name="product" >
                    @foreach($products as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                    </select>
                    <label for="product">Produto</label>
                    @if ($errors->has('product'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="red-text text-darken-1">{{$errors->first('product')}}</strong>
                        </span>
                    @endif
                </div>  
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input name="quantity" id="quantity" type="text" class="{{$errors->has('quantity') ? 'invalid' : 'validate'}}" value="{{old('quantity')}}">
                    <label for="quantity">Quantidade</label>
                    @if ($errors->has('quantity'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="red-text text-darken-1">{{$errors->first('quantity')}}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input name="discount" id="discount" type="text" class="{{$errors->has('discount') ? 'invalid' : 'validate'}}" value="{{old('discount')}}">
                    <label for="discount">Desconto</label>
                    @if ($errors->has('discount'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="red-text text-darken-1">{{$errors->first('discount')}}</strong>
                        </span>
                    @endif
                </div>  
            </div>              
            <button type="submit" class="btn black text-white left">Adicionar</button>
        </form>
    </div>
</div>
@endsection