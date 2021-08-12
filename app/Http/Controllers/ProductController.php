<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\Product\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        return view('product.index');
    }
    
    public function create()
    {
        $categories = (Category::class)::asArray();
        
        return view('product.create', compact('categories'));
    }
}
