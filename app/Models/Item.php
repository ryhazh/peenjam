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


    public function availableQuantity()
    {
        return $this->quantity - $this->records()->where('returned_at', null)->count();
    }
}
