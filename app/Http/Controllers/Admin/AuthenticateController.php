<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function showLoginForm(){
        return view('backend.account.login');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember') == 'on' ? True : False;
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember)){
            return redirect('/admin/dashboard');
        } else {
            session()->flash('loginfailed', 'Đăng nhập thất bại. Vui lòng kiểm tra lại email hoặc mật khẩu của bạn');
            return view('backend.account.login');
        }
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    public function showInformation(){
        $admin = Auth::guard('admin')->user();
        $active = 'information';
        return view('backend.account.information',compact('admin','active'));
    }

    public function updateInformation(Request $request){
        $request->validate([
            'name' => 'required',
            'phonenumber' => 'required'
        ]); 
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'name' => $request->input('name'),
            'phonenumber' => $request->input('phonenumber'),
        ]);
        session()->flash('success', 'Cập nhật thông tin thành công');
        return redirect('admin/information'); 
    }
    public function showChangePasswordForm(){
        $active = 'changepassword';
        return view('backend.account.changePassword',compact('active'));
    }
    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required'
        ]);
        $password = $request->input('password');
        $newpassword = $request->input('newpassword');
        if (Hash::check($password, Auth::guard('admin')->user()->password)){
            // dd('ahihi');
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($newpassword)
            ]);
            session()->flash('success', 'Đổi mật khẩu mới  thành công.');
            return back();
        } else {
            session()->flash('failed', 'Đổi mật khẩu mới không thành công. Vui lòng kiểm tra lại mật khẩu');
            return back();
        }

    }
}
