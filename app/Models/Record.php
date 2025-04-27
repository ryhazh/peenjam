<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'borrowed_at',
        'due_date',
        'returned_at',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getStatusAttribute() 
    {
        if ($this->returned_at) {
            return 'Returned';
        } elseif ($this->due_date < now()) {
            return 'Overdue';
        } else {
            return 'Borrowed';
        }
    }
}
