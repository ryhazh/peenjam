<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function getAvailableItemsAttribute()
    {
        $borrowedCount = $this->records()
            ->whereNull('returned_at')
            ->sum('quantity');

        return $this->quantity - ($borrowedCount ?? 0);
    }
}
