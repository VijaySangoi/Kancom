<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthCode extends Model
{
    protected $fillable = [
        'user_id',
        'ebay_store_id',
        'code',
        'state',
        'expires_in'
    ];
}
