<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'reference_no',
        'tax',
        'service_charge',
        'total_amount_cents',
        'is_walkin',
        'status',
    ];

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }
}
