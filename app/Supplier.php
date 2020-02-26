<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $guarded = [];
    
    public function supplier_products()
        {
            return $this->hasMany(SupplierProduct::class);
        }
}
