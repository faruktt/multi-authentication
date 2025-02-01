<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    function rel_to_category(){
        return $this->BelongsTo(Category::class,'category_id');
    }
}
