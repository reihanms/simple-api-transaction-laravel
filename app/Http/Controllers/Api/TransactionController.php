<?php

namespace App\Http\Controllers\Api;

use App\Models\Transaction;
use App\Models\TransactionProduct;
use App\Models\TransactionPaymentMethod;
use App\Http\Controllers\Controller;
// use Illuminate\Https\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'customer_name' => 'required|string',
            'address_id' => 'required|integer',
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'payment_method_id' => 'required|integer',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            try {
                $transaction = Transaction::create([
                    'id' => $request->id,
                    'customer_address_id' => $request->address_id,
                    'order_date' => now(),
                ]);
                $transactionProduct = TransactionProduct::create([
                    'transaction_id' => $request->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'payment_method_id' => $request->payment_method_id,
                ]);
                $transactionPaymentMethod = TransactionPaymentMethod::create([
                    'transaction_id' => $request->id,
                    'payment_method_id' => $request->payment_method_id,
                ]);

                if($transaction && $transactionProduct && $transactionProduct) {
                    return response()->json([
                        'status' => 200,
                        'message' => "Data Added Succesfully",
                        'data' => $request->all()
                    ],200);
                } else {
                    return response()->json([
                        'status' => 500,
                        'message' => "Something went wrong :("
                    ],200);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => 500,
                    'message' => $th,
                ], 500);
            }
        }
    }
}

