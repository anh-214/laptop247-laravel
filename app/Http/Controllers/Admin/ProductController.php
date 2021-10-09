<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function showCreateProductFormFromCategory($id){
        $category = Category::where('id',$id)->first();
        $active = 'products';
        return view('backend.createProduct',compact('category','active'));
    }
    public function showCreateProductForm(){
        $categories = Category::all('id','name');
        $active = 'products';
        return view('backend.createProduct1',compact('categories','active'));
    }
    public function products(){
        $products = Product::paginate(10);
        $active = 'products';
        return view('backend.product',compact('products','active'));
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'harddrive' => 'required',
            'card' => 'required',
            'display' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        // dd($request->input());
        $result = Product::create([
            'name' => $request->input('name'),
            'cpu' => $request->input('cpu'),
            'ram' => $request->input('ram'),
            'harddrive' => $request->input('harddrive'),
            'display' => $request->input('display'),
            'card' => $request->input('card'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $images = $request->file('images');
        $count = 0;
        foreach ($images as $image){
            $image->storeAs('',$result->id.'-'.$count.'.'.$image->getClientOriginalExtension(),'product-image');
            Image::create([
                'name'=> $result->id.'-'.$count.'.'.$image->getClientOriginalExtension(),
                'product_id' => $result->id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $count += 1;
        }
        session()->flash('success','Thêm sản phẩm thành công');
        return redirect('admin/products');
    }
    public function delete(Request $request){
        if (Hash::check($request->input('confirmPasswordDelete'), Auth::guard('admin')->user()->password)){
            $files = Product::findOrFail($request->input('deleteId'))->images()->get();
                foreach ($files as $file){
                    Storage::disk('product-image')->delete($file->name);

            }
            Product::findOrFail($request->input('deleteId'))->images()->delete();
            Product::findOrFail($request->input('deleteId'))->delete();
            session()->flash('success','Xóa thành công');
            return back();
        } else {
            session()->flash('failed','Xóa thất bại, kiểm tra lại mật khẩu');
            return back();
        }
    }
    public function showUpdateForm($id){
        $categories = Category::all('id','name');
        $product = Product::where('id',$id)->first();
        $active = 'products';
        return view('backend.updateProduct',compact('categories','product','active'));
    }
    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'harddrive' => 'required',
            'card' => 'required',
            'display' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);
        // dd($request->input());
        Product::where('id',$request->input('id'))->update([
            'name' => $request->input('name'),
            'cpu' => $request->input('cpu'),
            'ram' => $request->input('ram'),
            'harddrive' => $request->input('harddrive'),
            'display' => $request->input('display'),
            'card' => $request->input('card'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
            'updated_at' => now()
        ]);
        $images = $request->file('images');
        if ($images != null){
            $files = Product::findOrFail($request->input('id'))->images()->get();
            Product::findOrFail($request->input('id'))->images()->delete();
            foreach ($files as $file){
                Storage::disk('product-image')->delete($file->name);

            }
            $count = 0;
            foreach ($images as $image){
                $image->storeAs('',$request->input('id').'-'.$count.'.'.$image->getClientOriginalExtension(),'product-image');
                Image::create([
                    'name'=> $request->input('id').'-'.$count.'.'.$image->getClientOriginalExtension(),
                    'product_id' => $request->input('id'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $count += 1;
            }
        }
        session()->flash('success','Cập nhật sản phẩm thành công');
        return redirect('admin/products');
    }
    public function getImages(Request $request){
        if( $request->ajax()){
            $product_id = $request->input('product_id');
            $links = array();
            $images =Product::findOrFail($product_id)->images()->get();
            foreach ($images as $image){
                    $link = Storage::disk('product-image')->url($image->name);
                    array_push($links,$link);
            }
            return json_encode($links);
        }
    }
    
}

