<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $guarded = [];
       public function product()
    {
        // if clumon name forgen key not as table name
        // return $this->belongsTo(Section::class,'prosection');
        return $this->belongsTo(Product::class);
    }
}
