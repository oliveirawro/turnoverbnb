<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function transactions()
    {
        $this->hasMany(Transaction::class);
    }
}
