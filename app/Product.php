<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incremments = true;
    protected $table = 'products';
    protected $fillable = [
    'id',
    'name',
    'description',
    'price',
    ];
    
    public function productSales(){     
        return $this->hasOne('App\Sale', 'id_product');
    }
}
