<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['image', 'name', 'description', 'quantity', 'category_id'];

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

        $borrowedQuantityOfThisItem = $this->records()
            ->whereNull('returned_at')
            ->sum('quantity');

        return max(0, $this->quantity - ($borrowedQuantityOfThisItem ?? 0));
    }

    public function getTotalBorrowedQuantityAttribute()
    {
        return $this->records()->sum('quantity');
    }

    public function getTotalReturnedQuantityAttribute()
    {
        return $this->records()->whereNotNull('returned_at')->sum('quantity');
    }
}
