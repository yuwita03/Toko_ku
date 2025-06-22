<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'product_id',
        'product_name', // tambahkan baris ini
        'quantity',
        'sell_price',
        'cost_price',
        'profit',
    ];
}
