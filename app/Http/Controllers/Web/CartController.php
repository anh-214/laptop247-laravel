<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Ward;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {   
        $product = Product::findOrFail($request->id);
        $image = Storage::disk('product-image')->url($product->images[0]->name);
        $cart = session()->get('cart', []);
        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $image
            ];
        }
        session()->put('cart', $cart);
        session()->flash('success', 'Thêm sản phẩm thành công');
        return response()->json([
            'result' => 'success'
        ]);
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cập nhật giỏ hàng thành công');
            return back();
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa sản phẩm thành công');
            return response()->json([
                'result' => 'success'
            ]);
        }
    }
    public function checkout(){
        $cart = session()->get('cart', []);
        if($cart == []) {
            session()->flash('fail', 'Giỏ hàng trống');
            return redirect('category/1');
        } else{
            if (Auth::guard('web')->check()){
                $provinces = Province::all();
                return view('frontend.cart',compact('cart','provinces'));
            } else {
                session()->flash('fail', 'Vui lòng đăng nhập để thanh toán !');
                return redirect('category/1');
            }
        }
    }
    public function getDistricts(Request $request){
        if( $request->ajax()){
            $province_id = $request->input('province_id');
            $districts = Province::findOrFail($province_id)->districts()->get();
            return json_encode($districts);
        }
    }
    public function getWards(Request $request){
        if( $request->ajax()){
            $district_id = $request->input('district_id');
            $wards = District::findOrFail($district_id)->wards()->get();
            return json_encode($wards);
        }
    }
}
