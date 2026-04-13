<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
