<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    protected $guarded = [];

    public function supplier()
        {
            return $this->belongsTo(Supplier::class);
        }
}
