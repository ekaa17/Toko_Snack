<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'date'];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }
}
