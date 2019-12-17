<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use App\Product;
use App\Status_Sale;
use Illuminate\Http\Request;

//Controller de Vendas
class SaleController extends Controller
{
    //Relaciona todos as Vendas Cadastradas no banco e retorna para a view sale
    public function index()
    {
        $sale = Sale::all(); 
        $sale->load('salesCustomer');
        $sale->load('salesProduct');
        $sale->load('salesStatus');
        return view('sale', compact('sale'));
    }
    //Retorna a view createSale, com formulário para criar nova Venda
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('createSale', compact('customers', 'products'));
    }
    //Cria um nova Venda, retorna para view template, espera um request
    public function store(Request $request)
    {
        //Regras do Validate do Laravel
        $regras = [                        
            'customer' => 'required',
            'product' => 'required',
            'quantity' => 'required|integer',            
        ];
        //Mensagens de Retorno do Validade
        $mensagens = [             
            'quantity.required' => 'Favor Informar a Quantidade do Produto' ,
        ];
        $request->validate($regras, $mensagens);

        //Criar nova Venda
        $p = Product::find($request->product);
        $amount = $request->quantity * $p->price;
        sale::create([
           'id_product' => $request->product,
           'id_customer' => $request->customer,
           'quantity' => $request->quantity,
           'discount' => $request->discount,
           'sales_amount' => $amount,
           'id_status' => 4
        ]);

        return redirect()->route('sale.index');
    }

    public function show(sale $sale)
    {
        //
    }
    //Retorna a view editSale, com formulário para editar a Venda, espera o id da Venda como parâmetro
    public function edit($id)
    {
        $sale = Sale::find($id);
        $sale->load('salesCustomer');
        $sale->load('salesProduct');
        $sale->load('salesStatus');
        $status = Status_Sale::all();
        return view('editSale', compact('sale', 'status'));
    }
    //Edita uma Venda, retorna para view template, espera um request e o id da Venda como parâmetro
    public function update(Request $request, $id)
    {
        //Regras do Validate do Laravel
        $regras = [                        
            'status' => 'required',            
        ];
        //Mensagens de Retorno do Validade
        $mensagens = [             
            'status.required' => 'Favor Informar o Status da Venda' ,         
        ];
        $request->validate($regras, $mensagens);

        //Pesquisa o Id da Venda e Atualiza se encontrado
        $sale = Sale::find($id);
        if($sale){
            $sale->id_status = $request->status;
            $sale->save();
        }

        return redirect()->route('sale.index');
    }

    public function destroy(sale $sale)
    {
        //
    }
}
