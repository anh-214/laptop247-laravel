<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccessoryController extends Controller
{
    public function showAccessories(){
        $active = 'accessories';
        $accessories = Accessory::all();
        return view('backend.accessory',compact('active','accessories'));
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);
        $name = $request->input('name');
        $price = $request->input('price');
        $type = $request->input('type');
        Accessory::insert([
            'name' => $name,
            'price' => $price,
            'type' => $type,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('success','Thêm linh kiện thành công');
        return back();
        
    }
    public function delete(Request $request){
        // dd($request);
        if (Hash::check($request->input('confirmPasswordDelete'), Auth::guard('admin')->user()->password)){
            Accessory::where('id',$request->input('deleteId'))->delete();
            session()->flash('success','Xóa thành công');
            return back();
        } else {
            session()->flash('failed','Xóa thất bại, kiểm tra lại mật khẩu');
            return back();
        }
    }
    public function update(Request $request){
        // dd($request->input());
        $request->validate([
            'updateId' => 'required',
            'name' => 'required',
            'price' => 'required',
            'type' => 'required'
        ]);
        $name = $request->input('name');
        $id = $request->input('updateId');
        $price = $request->input('price');
        $type = $request->input('type');
        $result = Accessory::where('id', $id)->update([
                    'name' => $name,
                    'price' => $price,
                    'type' => $type,
                    'updated_at' => now()
                ]);
        if ($result){
            session()->flash('success','Sửa linh kiện thành công');
            return back();
        } else {
            session()->flash('failed','Sửa linh kiện thất bại');
            return back();

        }
    }
}
