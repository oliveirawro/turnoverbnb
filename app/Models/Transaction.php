<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function transaction_type()
    {
        $this->hasOne(TransactionType::class, 'id', 'transaction_type_id');
    }

    public function scopeIncomes($query)
    {
        return $query->where('transaction_type_id', TransactionType::TYPE_DEPOSIT);
    }

    public function scopeExpenses($query)
    {
        return $query->where('transaction_type_id', TransactionType::TYPE_WITHDRAW);
    }
}
