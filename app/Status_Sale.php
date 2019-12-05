<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status_Sale extends Model
{
    public $incremments = true;
    protected $table = 'status_sales';
    protected $fillable = [
    'id',
    'name',
    ];
    
    public function statusSales(){     
        return $this->hasMany('App\Sale', 'id_status');
    }
}
