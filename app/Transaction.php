<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'order_id',
        'payment_method',
        'status',
        'paid_amount_cents'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
