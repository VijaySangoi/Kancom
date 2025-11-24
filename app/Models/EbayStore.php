<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EbayStore extends Model
{
    use SoftDeletes;
    public $fillable = [
        'store_name',
        'ebay_client_id',
        'ebay_dev_id',
        'ebay_client_secret',
        'ebay_redirect_uri'
    ];

}
