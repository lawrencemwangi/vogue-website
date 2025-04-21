<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'names', 
        'email',
        'phone',
        'address',
        'total',
        'cart',
        'order_number',
        'paid',
        'status',
    ];
}
