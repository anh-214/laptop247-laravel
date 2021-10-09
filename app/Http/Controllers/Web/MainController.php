<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function aboutUs(){
        return view('frontend.aboutus');
    }
    public function policy_support(){
        return view('frontend.policy_support');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function home(){
        return view('frontend.home');
    }
}
