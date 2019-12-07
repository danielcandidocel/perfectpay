<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

    //Controller de Produtos
class ProductController extends Controller
{    
    //Relaciona todos os Produtos Cadastrados no banco e retorna para a view product
    public function index()
    {
        $product = Product::all();
        return view('product', compact('product'));
    }
    //Retorna a view createProduct, com formulário para criar novo Produto
    public function create()
    {
        return view('createProduct');
    }
    //Cria um novo Produto, retorna para view template, espera um request
    public function store(Request $request)
    {
    //Regras do Validate do Laravel
        $regras = [                        
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    //Mensagens de Retorno do Validade
        $mensagens = [             
            'name.required' => 'O Nome do Produto não pode estar em branco.' ,
            'description.required' => 'A Descrição do Produto não pode estar em branco.' ,
            'price.required' => 'O Preço do Produto não pode estar em branco.' ,
            'price.regex' => 'O Preço do Produto está com formato inválido. (100.00)' ,
        ];
        $request->validate($regras, $mensagens);

    //Criar novo Produto
        Product::create([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price
        ]);

        return view('template');
    }

    public function show(Product $product)
    {
        //
    }
//Retorna a view editProduct, com formulário para editar o Produto, espera o id do     Produto como parâmetro
    public function edit($id)
    {
        $product = Product::find($id);
        return view('editProduct', compact('product'));
    }
//Edita um Produto, retorna para view template, espera um request e o id do Produto     como parâmetro
    public function update(Request $request, $id)
    {
    //Regras do Validate do Laravel
        $regras = [                        
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    //Mensagens de Retorno do Validade
        $mensagens = [             
            'name.required' => 'O Nome do Produto não pode estar em branco.' ,
            'description.required' => 'A Descrição do Produto não pode estar em branco.' ,
            'price.required' => 'O Preço do Produto não pode estar em branco.' ,
            'price.regex' => 'O Preço do Produto está com formato inválido. (100.00)' ,
        ];
        $request->validate($regras, $mensagens);

            //Pesquisa o Id do Produto e Atualiza se encontrado
        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();
        }

        return view('template');
    }

    public function destroy(Product $product)
    {
        //
    }
}
