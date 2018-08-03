<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;

class EventPrizeController extends Controller
{
    public function index(){
        $eventprizes=EventPrize::all();
        return view('eventprize.index',compact('eventprizes'));
    }
    public function create(){
        $events=Event::all();
        return view('eventprize.create',compact('events'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'num'=>'required'
        ],[
            'name.required'=>"奖品名不能为空",
            'description.required'=>"奖品描述不能为空",
            'num.required'=>"商品数量不能为空"
        ]);
        EventPrize::create([
            'events_id'=>$request->input('event_id'),
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'num'=>$request->input('num'),
            'member_id'=>0
        ]);
        session()->flash('success',"添加奖品成功！");
        return redirect(route('eventprize.index'));
    }
    public function show($id){
        $eventprize=EventPrize::where('id',$id)->first();
        return view('eventprize.show',compact('eventprize'));
    }
    public function edit($id){
        $eventprize=EventPrize::where('id',$id)->first();
        $event=Event::where('id',$eventprize->events_id)->first();
        return view('eventprize.edit',compact('eventprize','event'));
    }
    public function update(Request $request,$id){
            $eventprize=EventPrize::where('id',$id)->first();
            $eventprize->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'events_id'=>$request->input('event_id'),
                'num'=>$request->input('num')
            ]);
            session()->flash('success',"修改成功");
            return redirect(route('eventprize.index'));
    }
    public function destroy($id){
        $eventprize=EventPrize::where('id',$id)->first();
        $eventprize->delete();
        session()->flash('success', "删除成功！!");
        return redirect(route('eventprize.index'));
    }
}
