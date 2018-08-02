<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
        public function index(){
            $time=time();
            $activities=Activity::where('end_time','>',$time)->get();
//            $activities=DB::table('activities')->where()->get();
            return view('activity.index',compact('activities'));
        }
        public function create(){
            return view('activity.create');
        }
        public function store(Request $request){
            $this->validate($request,[
                'title'=>'required|max:100',
                'content'=>'required',
                'start_time'=>'required',
                'end_time'=>'required'
            ],[
                'title.required'=>"活动标题不能为空",
                'title.max'=>"活动标题过长",
                'content.required'=>"活动内容不能为空",
                'start_time.required'=>"开始时间不能为空",
                'end_time.required'=>"结束时间不能为空"
            ]);
            $starttime=strtotime(request()->input('start_time'));
            $endtime=strtotime(request()->input('end_time'));
            if ($endtime<$starttime){
                session()->flash('danger',"活动结束时间不能大于开始时间!");
                return redirect()->back();
            }else{
            Activity::create([
                'title'=>$request->input('title'),
                'content'=>$request->input('content'),
                'start_time'=>strtotime($request->input('start_time')),
                'end_time'=>strtotime($request->input('end_time')),
            ]);
            session()->flash('success',"添加成功!");
            return redirect(url('activity'));
            }
        }
        public function edit(Activity $activity){
            return view('activity.edit',compact('activity'));
        }
        public function update(Request $request,Activity $activity){
            $starttime=strtotime(request()->input('start_time'));
            $endtime=strtotime(request()->input('end_time'));
            if ($endtime<$starttime){
                session()->flash('danger',"活动结束时间不能大于开始时间!");
                return redirect()->back();
            }
            $activity->update([
                'title'=>$request->input('title'),
                'content'=>$request->input('content'),
                'start_time'=>strtotime($request->input('start_time')),
                'end_time'=>strtotime($request->input('end_time')),
            ]);
            session()->flash('success',"修改成功!");
            return redirect(url('activity'));
        }
        public function destroy(Activity $activity){
            $activity->delete();
            session()->flash('success',"删除成功!");
            return redirect(url('activity'));
        }
        public function all(){
            $activities=Activity::all();
            return view('activity.show',compact('activities'));
        }
        public function ongoing(){
            $time=time();
            $activities=Activity::where('end_time','>',$time)->get();
            return view('activity.show',compact('activities'));
        }
        public function overdue(){
            $time=time();
            $activities=Activity::where('end_time','<',$time)->get();
            return view('activity.show',compact('activities'));
        }
}
