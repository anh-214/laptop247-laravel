<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    public function showLoginForm(){
        return view('frontend.account.login');
    }
    public function showRegisterForm(){
        return view('frontend.account.register');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember') == 'on' ? True : False;

        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $remember)){
            session()->flash('success', 'Đăng nhập thành công');
            return redirect('/home');
        } else {
            session()->flash('fail', 'Đăng nhập thất bại. Vui lòng kiểm tra lại email hoặc mật khẩu của bạn');
            return view('frontend.account.login');
        }
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required','unique:users,email'],
            'phonenumber' => 'required',
            'password' => 'required'
        ]);
        // dd($request->input());
        User::create($request->input());
        User::where('email',$request->input('email'))->update([
                'created_at' => now(),
                'updated_at' => now(),
                'remember_token' => Str::random(60),
        ]);
        session()->flash('success', 'Đăng ký tài khoản thành công');
        return back();
    }
    public function logout(){
        Auth::guard('web')->logout();
        return back();
    }
    public function showChangePasswordForm(){
        return view('frontend.account.changePassword');
    }
    public function changePassword(Request $request){
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required'
        ]);
        $password = $request->input('password');
        $newpassword = $request->input('newpassword');

        if (Hash::check($password, Auth::guard('web')->user()->password)){
            User::where('id', Auth::guard('web')->user()->id)->update([
                'password' => Hash::make($newpassword)
            ]);
            session()->flash('success', 'Đổi mật khẩu mới  thành công.');
            return view('frontend.account.changePassword');
        } else {
            session()->flash('fail', 'Đổi mật khẩu mới không thành công. Vui lòng kiểm tra lại mật khẩu');
            return view('frontend.account.changePassword');
        }

    }
    public function showForgotPasswordForm(){
        return view('frontend.account.forgotPassword');
    }
    public function forgotPassword(Request $request){
        $request->validate([
            'email' => ['required']
        ]);
        $user = User::where('email',$request->input('email'))->first();
        $email = $request->input('email');
        if ($user != null){
            $password = Str::random(10);
            User::where('email',$email)->update([
                'password' => Hash::make($password),
            ]);
            Mail::to($email)->send(new SendPassword($email,$password));
            session()->flash('success', 'Vui lòng kiểm tra email của bạn để lấy mật khẩu mới');
            return redirect('user/forgotpassword');        
        } else {
            session()->flash('fail', 'Email này chưa được liên kết với tài khoản nào !');
            return redirect('user/forgotpassword');        
        }
    }
    public function showInformation(){
        return view('frontend.account.information');
    }
    public function updateInformation(Request $request){
        $request->validate([
            'name' => 'required',
            'phonenumber' => 'required'
        ]); 
        User::where('id',Auth::guard('web')->user()->id)->update([
            'name' => $request->input('name'),
            'phonenumber' => $request->input('phonenumber'),
        ]);
        session()->flash('success', 'Cập nhật thông tin thành công');
        return redirect('user/information'); 
    }
}
