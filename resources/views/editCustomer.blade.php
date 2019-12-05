@extends('template')
@section('titulo', 'Editar Produto')
@section('conteudo')
<div class="row center">
        <div class="col s2"></div>
        <div class="col s6">
            <h6 class="center">Editar Cliente</h6>
            <form class="col s12" method="POST" action="{{route('customerUpdate', $customer->id)}}">
            @csrf                
                <div class="row">
                    <div class="input-field col s8">
                        <input name="name" id="name" type="text" class="{{$errors->has('name') ? 'invalid' : 'validate'}}" value="{{$errors->has('name') ? old('name'):$customer->name}}">
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
                        <input name="email" id="email" type="text" class="{{$errors->has('email') ? 'invalid' : 'validate'}}" value="{{$errors->has('email') ? old('email'):$customer->email}}">
                        <label for="name">Descrição do Produto</label>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="red-text text-darken-1">{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>            
                <button type="submit" class="btn black text-white left">Salvar</button>
            </form>
        </div>
    </div>
@endsection