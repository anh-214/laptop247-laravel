<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function delete(Request $request){
        // dd($request);
        if (Hash::check($request->input('confirmPasswordDelete'), Auth::guard('admin')->user()->password)){
            Category::where('id',$request->input('deleteId'))->delete();
            session()->flash('success','Xóa thành công');
            return back();
        } else {
            session()->flash('failed','Xóa thất bại, kiểm tra lại mật khẩu');
            return back();
        }
    }
    public function create(Request $request){
        $name = $request->input('name');
        $desc = $request->input('desc');
        Category::insert([
            'name' => $name,
            'desc' => $desc,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        session()->flash('success','Thêm thể loại thành công');
        return back();
    }

    public function update(Request $request){
        // dd($request->input());
        $request->validate([
            'updateId' => 'required',
            'name' => 'required',
            'desc' => 'required'
        ]);
        $name = $request->input('name');
        $id = $request->input('updateId');
        $desc = $request->input('desc');
        
        $result = Category::where('id', $id)->update([
                    'name' => $name,
                    'desc' => $desc,
                    'updated_at' => now()
                ]);
        if ($result){
            session()->flash('success','Sửa thể loại thành công');
            return back();
        } else {
            session()->flash('failed','Sửa thể loại thất bại');
            return back();

        }
    }
}
