<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionProduct extends Model
{
    use HasFactory;
    protected $table = 'transaction_product';

    protected $fillable = [
        'transaction_id', 'product_id', 'quantity', 'payment_method_id'
    ];
}
