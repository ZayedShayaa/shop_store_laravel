<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function user()
    {
        // if clumon name forgen key not as table name
        // return $this->belongsTo(Section::class,'prosection');
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
