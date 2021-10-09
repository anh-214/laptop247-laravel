<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id){
        $products = Category::findOrfail($id)->products()->with('images')->get();
        // dd($products);
        $category = Category::where('id',$id)->first();
        return view('frontend.category',compact('products','category'));
    }
}
