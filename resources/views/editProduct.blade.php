@extends('template')
@section('titulo', 'Editar Produto')
@section('conteudo')
<div class="row center">
        <div class="col s2"></div>
        <div class="col s6">
            <h6 class="center">Editar Produto</h6>
            <form class="col s12" method="POST" action="{{route('productUpdate', $product->id)}}">
            @csrf                
                <div class="row">
                    <div class="input-field col s8">
                        <input name="name" id="name" type="text" class="{{$errors->has('name') ? 'invalid' : 'validate'}}" value="{{$errors->has('name') ? old('name'):$product->name}}">
                        <label for="name">Nome do Produto</label>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="red-text text-darken-1">{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>  
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <input name="description" id="description" type="text" class="{{$errors->has('description') ? 'invalid' : 'validate'}}" value="{{$errors->has('description') ? old('description'):$product->description}}">
                        <label for="name">Descrição do Produto</label>
                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="red-text text-darken-1">{{$errors->first('description')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5">
                        <input name="price" id="price" type="text" class="{{$errors->has('price') ? 'invalid' : 'validate'}}" value="{{$errors->has('price') ? old('price'):$product->price}}">
                        <label for="name">Preço do Produto</label>
                        @if ($errors->has('price'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="red-text text-darken-1">{{$errors->first('price')}}</strong>
                            </span>
                        @endif
                    </div>  
                </div>              
                <button type="submit" class="btn black text-white left">Salvar</button>
            </form>
        </div>
    </div>
@endsection