<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbayScope extends Model
{
    protected $table = 'ebay_scope';
    protected $fillable = [
        'url',
        'description',
        'type'
    ];
}
