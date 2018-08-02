<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function changeStatus(Shop $shop){
        try{
            DB::beginTransaction();
            $shop->update(['status'=>!$shop->status]);
            User::where('id',$shop->user->id)->update(['status'=>!$shop->user->status]);
            DB::commit();
            session()->flash('success','修改状态成功');
            return redirect('user');

        }catch (\Exception $exception){
            DB::rollback();
            session()->flash('error','修改失败');
            return redirect()->back();
        }

    }
}
