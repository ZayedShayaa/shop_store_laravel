<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    public function section()
    {
        // if clumon name forgen key not as table name
        // return $this->belongsTo(Section::class,'prosection');
        return $this->belongsTo(Section::class);
    }
}
