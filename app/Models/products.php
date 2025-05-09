<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price', 'quantity'];

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }
}
