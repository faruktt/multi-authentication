<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    function rel_to_cet(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
