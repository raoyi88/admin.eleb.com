<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(){
        $permissions=DB::table('model_has_roles')->get();
        $admins=Admin::all();
        return view('admin.index',compact('admins','permissions'));
    }
    public function create()
    {
        $roles=Role::all();
        return view('admin.create',compact('roles'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:20',
            'password'=>'required|max:20',
            'email'=>'required|email'
        ],[
            'name.required'=>"名称不能为空",
            'name.max'=>"名称超长",
            'password.required'=>"密码不能为空",
            'password.max'=>"密码过长",
            'email.required'=>"邮箱不能为空",
            'email.email'=>"请确认邮箱格式"
        ]);
        $admin=Admin::create([
                'name'=>$request->input('name'),
                'password'=>bcrypt($request->input('password')),
                'email'=>$request->input('email')
            ]
        );
        $admin->assignRole($request->input('role'));
        session()->flash('success',"添加后台管理员成功！");
        return redirect(route('admin.index'));
    }
    public function edit(Admin $admin){
        return view('admin.edit',compact('admin'));
    }
    public function update(Admin $admin,Request $request){
        $this->validate($request,[
            'name'=>'required|max:20',
            'email'=>'required|email'
        ],[
            'name.required'=>"名称不能为空",
            'name.max'=>"名称超长",
            'email.required'=>"邮箱不能为空",
            'email.email'=>"请确认邮箱格式"
        ]);
        $admin->update([
           'name'=>$request->input('name'),
           'email'=>$request->input('email')
        ]);
        session()->flash('success',"修改成功！");
        return redirect(route('admin.index'));
    }
    public function destroy(Admin $admin){
        $admin->delete();
        session()->flash('success',"删除成功");
        return redirect(route('admin.index'));
    }
    public function editpassword(){
        return view('admin.newpassword');

    }
    public function savenewpass(Request $request){
    $this->validate($request,[
        'oldpassword'=>'required|max:20',
        'newpassword'=>'required|max:20',
        'repassword'=>'required|max:20'
    ],[
        'oldpassword.required'=>"原密码不能为空",
        'oldpassword.max'=>"原密码长度过长",
        'newpassword.required'=>"新密码不能为空",
        'newpassword.max'=>"新密码长度过长",
        'repassword.required'=>"确认密码不能为空",
        'repassword.max'=>"确认密码长度过长"
    ]);
    if ($request->input('newpassword')!=$request->input('repassword')){
        session()->flash('danger',"两次密码不一致");
    }
    if (!Hash::check($request->input('oldpassword'),Auth::user()->password)){
        session()->flash('danger',"原密码不正确");
        return redirect()->back();
    }
    $user=Auth::user();
    $user->password=bcrypt(request()->input('newpassword'));
    $user->save();
    session()->flash('success',"修改成功");
    return redirect(route('user.index'));
}
}
