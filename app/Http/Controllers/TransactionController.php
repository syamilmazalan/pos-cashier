<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'tax' => 'required',
            'service_charge' => 'required',
            'total_amount_cents' => 'required',
            'is_walkin' => 'required',
            'order_items' => 'required|array',
            'payment_method' => 'required',
            'paid_amount_cents' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            // Create order
            $order = Order::create([
                'reference_no' => Order::generateReferenceNo(),
                'tax' => $request->tax,
                'service_charge' => $request->service_charge,
                'total_amount_cents' => $request->total_amount_cents,
                'is_walkin' => $request->is_walkin,
                'status' => 'Pending'
            ]);

            // Create order items
            foreach ($request->order_items as $item) {
                $order->orderItems()->create([
                    'cost_per_item' => $item['cost'],
                    'product_name' => $item['product'],
                    'quantity' => $item['quantity']
                ]);
            }

            // Create transaction
            $transaction = $order->transactions()->create([
                'payment_method' => $request->payment_method,
                'status' => 'Pending',
                'paid_amount_cents' => $request->paid_amount_cents
            ]);

            // Update status
            if ($transaction) {
                $transaction->update([
                    'status' => 'Completed'
                ]);

                $order->update([
                    'status' => 'Paid'
                ]);
            }
        });

        return response()->json([
            'message' => 'Successfully saved transaction!'
        ]);
    }
}
