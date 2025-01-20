<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'document',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }   
}
