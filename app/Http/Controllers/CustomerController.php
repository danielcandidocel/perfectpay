<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('customer', compact('customer'));
    }

    public function create()
    {
        return view('createCustomer');
    }

    public function store(Request $request)
    {
        $regras = [                        
            'name' => 'required',
            'email' => 'required|email',
        ];
        $mensagens = [             
            'name.required' => 'O Nome do Cliente não pode estar em branco.' ,
            'email.required' => 'O Email do Cliente não pode estar em branco.' ,
            'email.email' => 'Favor digitar um email válido'
        ];
        $request->validate($regras, $mensagens);

        Customer::create([
           'name' => $request->name,
           'email' => $request->email,
        ]);

        return view('template');
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('editCustomer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $regras = [                        
            'name' => 'required',
            'email' => 'required|email',
        ];
        $mensagens = [             
            'name.required' => 'O Nome do Cliente não pode estar em branco.' ,
            'email.required' => 'O Email do Cliente não pode estar em branco.' ,
            'email.email' => 'Favor digitar um email válido'
        ];
        $request->validate($regras, $mensagens);

        $customer = Customer::find($id);
        if($customer){
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->save();
        }

        return view('template');
    }

    public function destroy(Customer $customer)
    {
        //
    }
}
