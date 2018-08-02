<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RbacController extends Controller
{
    public function index(){
        $rbacs=DB::table('permissions')->get();
        return view('rbac.index',compact('rbacs'));
    }
    public function create(){
        return view('rbac.add');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required'
        ],[
            'name.required'=>"不能为空"
        ]);
        Permission::create(['name'=>$request->name]);
        session()->flash('success',"添加权限成功！");
        return redirect(route('rbac.index'));
    }
    public function edit($id){
        $permission=Permission::findById($id);
        return view('rbac.edit',compact('permission'));
    }
    public function update(Request $request,$id){
        $permission=Permission::findById($id);
        $permission->update(['name'=>$request->name]);
        session()->flash('success',"修改成功");
        return redirect(route('rbac.index'));
    }
    public function destroy($id){
        $permission=Permission::findById($id);
        $permission->delete();
        session()->flash('success',"删除权限成功");
                return redirect(route('rbac.index'));
    }
}
