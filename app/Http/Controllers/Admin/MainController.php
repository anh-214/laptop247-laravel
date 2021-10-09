<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        $active = 'dashboard';
        return view('backend.dashboard',compact('active'));
    }
    public function categories(){
        $categories = Category::all();
        $active = 'categories';
        return view('backend.category',compact('categories','active'));
    }
}
