<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

//Controller de Cliente
class CustomerController extends Controller
{
    //Relaciona todos os Clientes Cadastrados no banco e retorna para a view customer
    public function index()
    {
        $customer = Customer::all();
        return view('customer', compact('customer'));
    }
    //Retorna a view createCustomer, com formulário para criar novo Cliente
    public function create()
    {
        return view('createCustomer');
    }
    //Cria um novo Cliente, retorna para view template, espera um request
    public function store(Request $request)
    {
        //Regras do Validate do Laravel
        $regras = [                        
            'name' => 'required',
            'email' => 'required|email',
        ];
        //Mensagens de Retorno do Validade
        $mensagens = [             
            'name.required' => 'O Nome do Cliente não pode estar em branco.' ,
            'email.required' => 'O Email do Cliente não pode estar em branco.' ,
            'email.email' => 'Favor digitar um email válido'
        ];
        $request->validate($regras, $mensagens);

        //Criar novo Cliente
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
    //Retorna a view editCustomer, com formulário para editar o Cliente, espera o id do Cliente como parâmetro
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('editCustomer', compact('customer'));
    }
    //Edita um Cliente, retorna para view template, espera um request e o id do Cliente como parâmetro
    public function update(Request $request, $id)
    {
        //Regras do Validate do Laravel
        $regras = [                        
            'name' => 'required',
            'email' => 'required|email',
        ];
        //Mensagens de Retorno do Validade
        $mensagens = [             
            'name.required' => 'O Nome do Cliente não pode estar em branco.' ,
            'email.required' => 'O Email do Cliente não pode estar em branco.' ,
            'email.email' => 'Favor digitar um email válido'
        ];
        $request->validate($regras, $mensagens);

        //Pesquisa o Id do Cliente e Atualiza se encontrado
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
