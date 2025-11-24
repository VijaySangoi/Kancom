<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUpdateStatus extends Model
{
    protected $fillable = [
        'status_code',
        'sku',
        'locale',
        'warnings',
        'errors'
    ];
}
