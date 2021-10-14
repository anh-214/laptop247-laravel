<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LiveSearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->with('images')->take(5)->get();
            if ($products) {
                foreach ($products as $key => $product) {
                    
                    if (filter_var($product->images[0]->name, FILTER_VALIDATE_URL)) { 
                        $image = $product->images[0]->name;
                    } else {
                        $image = Storage::disk('product-image')->url($product->images[0]->name);
                    }   
                    $output .= 
                    '<li class="mb-2">
                        <div class="row">
                            <div class="col-3">
                                <img src="'.$image.'" style="width:100%">
                            </div>
                            <div class="col-9">
                                <a href="'.url('product/'.$product->id).'"> 
                                    <p>'.$product->name.'</p>
                                </a>
                                <p>'.number_format($product->price).' đ</p>
                            </div>
                        </div>
                    </li>';
                }
                if ($output == ''){
                    $output = 
                    '<li>
                        <div class="row">
                            <div class="col-12">
                                <p class="p-3">Không tìm thấy sản phẩm</p>
                            </div>
                        </div>
                    </li>';
                }
            }
            return Response($output);
        }
    }
}
