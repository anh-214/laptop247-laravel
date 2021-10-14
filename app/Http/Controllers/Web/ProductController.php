<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id,$product_id){
        // dd(session('cart'));
        $randoms = Category::findOrFail($category_id)->products()->with('images')->get()->random(4);
        $category = Category::where('id',$category_id)->first();
        $product = Product::where('id',$product_id)->first();
        return view('frontend.product',compact('product','category','randoms'));
    }
    public function getUrl($id){
        $category_id = Product::where('id',$id)->first()->category_id;
        return redirect(url('category/'.$category_id.'/product/'.$id));
    }
}
