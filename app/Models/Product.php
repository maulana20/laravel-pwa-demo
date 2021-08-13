<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Product\Category;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'category'
    ];
    
    protected $appends = ['category_name'];
    
    public function getCategoryNameAttribute()
    {
        if (empty($this->category)) return null;
        
        return Category::getKey($this->category);
    }
}
