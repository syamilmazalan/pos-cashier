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

    public static function generateReferenceNo()
    {
        $a = rand(1000, 9990);
        $b = rand(10000000, 99999999);
        $random = $a . '' . $b;

        if (!empty($random) && !self::where('reference_no', $random)->count()) {
            return $random;
        } else {
            self::generateTransactionNo();
        }
    }
}
