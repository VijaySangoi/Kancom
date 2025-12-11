<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUpdateStatus extends Model
{
    protected $table = 'product_update_status';
    protected $fillable = [
        'function',
        'status_code',
        'sku',
        'locale',
        'warnings',
        'errors'
    ];
}
