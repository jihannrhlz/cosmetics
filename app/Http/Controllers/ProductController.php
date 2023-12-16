<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(product $product){
        return view('show', [
            'product' => $product
        ]);
    }
}
