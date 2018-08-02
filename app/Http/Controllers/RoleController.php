<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('role.index',compact('roles'));
    }
    public function create(){
        $permissions=DB::table('permissions')->get();
        return view('role.create',compact('permissions'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>"不能为空！"
        ]);
        $role=Role::create(['name'=>$request->name]);
        $role->givePermissionTo($request->permission);
        session()->flash('success',"添加角色成功！");
        return redirect(route('roles.index'));
    }
    public function edit($id){
        $permissions=DB::table('permissions')->get();
        $role=Role::findById($id);
        return view('role.edit',compact('permissions','role'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>"角色不能为空！"
        ]);
        $role=Role::findById($id);
        $role->syncPermissions($request->permission);
        session()->flash('success',"角色修改成功！");
        return redirect(route('roles.index'));
    }
    public function destroy($id){
        $role=Role::findById($id);
        $role->delete();
        session()->flash('success',"删除角色成功！");
        return redirect(route('roles.index'));

    }
}
