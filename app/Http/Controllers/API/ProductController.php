<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;

class ProductController extends Controller
{
    use ApiResponser;
    
    public function index(Request $request)
    {
        return $this->sendResponse([['id' => 1, 'name' => 'h&m', 'category' => 1], ['id' => 2, 'name' => 'casio', 'category' => 2]], 'Product list getting success.');
    }
    
    public function store(Request $request)
    {
        return $this->sendResponse(null, 'Product successfully stored.');
    }
}
