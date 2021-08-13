<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;

class ProductController extends Controller
{
    use ApiResponser;
    
    public function index(Request $request)
    {
        $products = Product::all();
        
        return $this->sendResponse($products, 'Product list getting success.');
    }
    
    public function store(StoreRequest $request)
    {
        Product::create($request->getProduct());
        
        return $this->sendResponse(null, 'Product successfully stored.');
    }
}
