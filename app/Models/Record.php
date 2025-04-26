<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'borrow_date',
        'return_date',
        'status',
    ];
}
