<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $incremments = true;
    protected $table = 'sales';
    protected $fillable = [
    'id',
    'id_product',
    'id_customer',
    'quantity',
    'discount',
    'sales_amount',
    'id_status',
    ];

    public function salesCustomer(){     
        return $this->belongsTo('App\Customer', 'id_customer');
    }
    public function salesProduct(){     
        return $this->belongsTo('App\Product', 'id_product');
    }
    public function salesStatus(){     
        return $this->belongsTo('App\Status_Sale', 'id_status');
    }
}
