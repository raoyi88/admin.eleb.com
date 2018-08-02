<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    //    //修改保存
    public function update(Request $request, User $user)
    {
        $data = ([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        $user->update($data);
        session()->flash('success', "修改成功!");
        return redirect(url('admin'));
    }

    //添加管理员
    public function create()
    {
        $roles = Role::all();
        $categories = Shop_Categories::all();
        return view('user.create', compact('categories', 'roles'));
    }

    //添加保存管理员
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:30|confirmed',
            'password_confirmation' => 'required|max:30',
            'logo' => 'required',
            'shop_rating' => 'required',
            'shop_name' => 'required|max:20',
            'qisong' => 'required',
            'peisong' => 'required',
            'gonggao' => 'required',
            'youhui' => 'required'
        ], [
            'name.required' => "用户名不能为空",
            'name.max' => "用户名过长",
            'email.required' => "邮箱不能为空",
            'email.email' => "请输入正确的邮箱格式",
            'email.unique' => "此邮箱已被注册",
            'password.required' => "密码不能为空",
            'password.max' => "密码过长",
            'password_confirmation.required' => "请输入确认密码",
            'password.confirmed' => "两次密码不一致",
            'logo.required' => "请选择店铺图片",
            'shop_rating.required' => "请输入店铺评分",
            'shop_name.required' => "请填写店铺名",
            'shop_name.max' => "店铺名过长",
            'qisong.required' => "请填写起送金额",
            'peisong.required' => "请填写配送费用",
            'gonggao.required' => "请填写店面公告",
            'youhui.required' => "请填写优惠信息"
        ]);

        $filename = $request->file('logo')->store('shop_img', 'uploads');
        $data = ([
            'shop_category_id' => $request->input('shop_category_id'),
            'shop_name' => $request->input('shop_name'),
            'shop_img' => '/uploads/' . $filename,
            'shop_rating' => $request->input('shop_rating'),
            'brand' => $request->input('brand'),
            'on_time' => $request->input('zhun'),
            'fengniao' => $request->input('fengniao'),
            'bao' => $request->input('bao'),
            'piao' => $request->input('piao'),
            'zhun' => $request->input('zhunzhun'),
            'start_send' => $request->input('qisong'),
            'send_cost' => $request->input('peisong'),
            'notice' => $request->input('gonggao'),
            'discount' => $request->input('youhui'),
            'status' => $request->input('status')
        ]);
//        dd($request->all());
        try {
            DB::beginTransaction();
            $shop = Shop::create($data);
            $user_data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'status' => $request->input('status'),
                'shop_id' => $shop->id
            ];
            User::create($user_data);
            DB::commit();
            session()->flash('success', '注册完成');
            return redirect(url('user'));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back();
        }

    }

    //查看商铺管理员的信息,并可以将待审核的账号通过
    public function show($id)
    {
        $shop = DB::table('shops')->where('id', $id)->first();
        return view('shop.show', compact('shop'));
    }

    //删除
    public function destroy(User $user)
    {
        $user->getname()->delete();
        $user->delete();
        session()->flash('success', "删除成功");
        return redirect(url('user'));
    }

}



