<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            return redirect('user');
        }
        return view('login.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'password' => 'required|max:30',
            'captcha'=>'required|captcha'
        ], [
            'name.required' => "用户名不能为空",
            'name.max'=>"用户名过长",
            'password.required'=>'密码不能为空',
            'password.max'=>"密码过长",
            'captcha.required'=>"验证码不能为空",
            'captcha.captcha'=>"验证码错误"
        ]);
        if (Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            session()->flash('success',"欢迎回来");
            return redirect(route('user.index'));
        }else{
            session()->flash('danger',"请重新确认用户名和密码");
            return redirect()->back();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.index')->with('success',"注销成功");
    }
}
