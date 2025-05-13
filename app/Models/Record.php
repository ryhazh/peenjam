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
        'reason',
        'is_approved',
        'actions_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function actionUser()
    {
        return $this->belongsTo(User::class, 'actions_by');
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
