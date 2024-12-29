<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'total_price'];

    public function transaction()
    {
        return $this->belongsTo(Transactions::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
