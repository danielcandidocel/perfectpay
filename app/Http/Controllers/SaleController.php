<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Customer;
use App\Product;
use App\Status_Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sale = Sale::all(); 
        $sale->load('salesCustomer');
        $sale->load('salesProduct');
        $sale->load('salesStatus');
        return view('sale', compact('sale'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('createSale', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $regras = [                        
            'customer' => 'required',
            'product' => 'required',
            'quantity' => 'required|integer',            
        ];
        $mensagens = [             
            'quantity.required' => 'Favor Informar a Quantidade do Produto' ,
        ];
        $request->validate($regras, $mensagens);

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

        return view('template');
    }

    public function show(sale $sale)
    {
        //
    }

    public function edit($id)
    {
        $sale = Sale::find($id);
        $sale->load('salesCustomer');
        $sale->load('salesProduct');
        $sale->load('salesStatus');
        $status = Status_Sale::all();
        return view('editSale', compact('sale', 'status'));
    }

    public function update(Request $request, $id)
    {
        $regras = [                        
            'status' => 'required',
            
        ];
        $mensagens = [             
            'status.required' => 'Favor Informar o Status da Venda' ,         
        ];
        $request->validate($regras, $mensagens);

        $sale = Sale::find($id);
        if($sale){
            $sale->id_status = $request->status;
            $sale->save();
        }

        return view('template');
    }

    public function destroy(sale $sale)
    {
        //
    }
}
