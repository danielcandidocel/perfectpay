<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Customer;
use App\Product;
use App\Status_Sale;

//Controller para montar relatórios de vendas
class ReportController extends Controller
{
    //Método para Somar a quantidade de venda por status
    //Resultado enviado para View report
    public function index(){
        $status = Status_sale::all();
        foreach ($status as $key => $value) {
            $report[$key]['name'] = $value->name;
            $report[$key]['quantidade'] = Sale::where('id_status', $value->id)->sum('quantity');
            $report[$key]['total'] = Sale::where('id_status', $value->id)->sum('sales_amount');
        }        
        return view('report', compact('report'));
    }
}
