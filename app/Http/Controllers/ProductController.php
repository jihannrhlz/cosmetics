<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function show(product $product){
        // $product = product::first();
        // $product->rate(5);
        // dd(product::first()->ratings);
        return view('show', [
            'product' => $product
        ]);
    }
}
