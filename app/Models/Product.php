<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'supplier_id',
        'distributor_id',
        'brand_id',
        'country',
        'title',
        'shortDescription',
        'description',
        'imageUrls',
        'condition',
        'conditionDescription',
        'quantity',
        'is_substitute',
        'wholesale_price',
        'retail_price',
        'extra_charges',
        'total_price',
        'discounted_price',
    ];
}
