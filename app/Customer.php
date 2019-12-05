<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $incremments = true;
    protected $table = 'customers';
    protected $fillable = [
    'id',
    'name',
    'identification_type',
    'identification_number',
    'email',
    ];
    
    public function customerSales(){     
        return $this->hasOne('App\Sale', 'id_customer');
    }
}
