<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Customer;
use App\Product;
use App\Status_Sale;

class ReportController extends Controller
{
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
