<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'user_id', 'order_number', 'name', 'email', 'phone', 'address', 'city',
         'payment_method', 'payment_status', 'order_status', 'total_amount',
    ];

    public function orderDetails()

    {
        return $this->hasMany(OrderDetail::class);
    }



}
