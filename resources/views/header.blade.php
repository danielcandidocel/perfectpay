<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo asset('css/materialize.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('css/style.css')?>" type="text/css">

    <title>@yield('titulo')</title>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12" id="menu">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('product.index')}}">Produtos</a></li>
                    <li><a href="{{route('customer.index')}}">Clientes</a></li>
                    <li><a href="">Vendas</a></li>
                    <li><a href="">Relatórios</a></li>
                    
                </ul>
            </div>
        </div>