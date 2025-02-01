<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\product;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function product(){
        $products = Product::all();
        return view('product.product',compact('products'));
    }

    function product_add (Request $request){
        Product::insert([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'created_at'=>carbon::now(),
        ]);
        return redirect()->back();
    }
}
