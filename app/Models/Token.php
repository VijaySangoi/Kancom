<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'code_id',
        'token_type',
        'token',
        'refresh_token',
        'expire'
    ];
    public $timestamps = false;
}
