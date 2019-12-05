<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{    
    public function index()
    {
        $product = Product::all();
        return view('product', compact('product'));
    }

    public function create()
    {
        return view('createProduct');
    }

    public function store(Request $request)
    {
        $regras = [                        
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
        $mensagens = [             
            'name.required' => 'O Nome do Produto não pode estar em branco.' ,
            'description.required' => 'A Descrição do Produto não pode estar em branco.' ,
            'price.required' => 'O Preço do Produto não pode estar em branco.' ,
            'price.regex' => 'O Preço do Produto está com formato inválido. (100.00)' ,
        ];
        $request->validate($regras, $mensagens);

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

    public function edit($id)
    {
        $product = Product::find($id);
        return view('editProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $regras = [                        
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
        $mensagens = [             
            'name.required' => 'O Nome do Produto não pode estar em branco.' ,
            'description.required' => 'A Descrição do Produto não pode estar em branco.' ,
            'price.required' => 'O Preço do Produto não pode estar em branco.' ,
            'price.regex' => 'O Preço do Produto está com formato inválido. (100.00)' ,
        ];
        $request->validate($regras, $mensagens);

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
