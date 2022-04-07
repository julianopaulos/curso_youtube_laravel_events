<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct($id){
        $search = request('search');
        return view('product', compact('id', 'search'));
    }
}
