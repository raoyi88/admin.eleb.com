<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //活动列表
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }
    //添加活动
    public function create(){
        return view('event.create');
    }
    //保存活动
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:events',
            'content' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required'
        ], [
            'title.required' => "标题不能为空",
            'title.max' => "标题不得超过50字",
            'title.unique' => "改标题已存在",
            'content.required' => "内容不得为空",
            'start_time.required' => "请选择开始时间",
            'end_time.required' => "请选择结束时间",
            'prize_date.required' => "请选择开奖时间",
            'signup_num.required' => "请选择参与活动人数"
        ]);
        $starttime = strtotime(request()->input('start_time'));
        $endtime = strtotime(request()->input('end_time'));
        $prize_date = strtotime(request()->input('prize_date'));
        if ($endtime < $starttime) {
            session()->flash('danger', "活动结束时间不能大于开始时间!");
            return redirect()->back();
        } elseif ($prize_date < $endtime) {
            session()->flash('danger', "活动开奖时间不能小于活动结束时间!");
            return redirect()->back();
        } else {
            Event::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'signup_start' => $starttime,
                'signup_up' => $endtime,
                'prize_date' => $request->input('prize_date'),
                'signup_num' => $request->input('signup_num'),
                'is_prize' => 0
            ]);
            session()->flash('success', "添加成功!");
            return redirect(route('event.index'));
        }
    }

    //查看活动
    public function show(Event $event)
    {
        return view('event.show', compact('event'));
    }

    //修改活动
    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    //保存修改
    public function update(Event $event, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50|unique:events',
            'content' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'prize_date' => 'required',
            'signup_num' => 'required'
        ], [
            'title.required' => "标题不能为空",
            'title.max' => "标题不得超过50字",
            'title.unique' => "改标题已存在",
            'content.required' => "内容不得为空",
            'start_time.required' => "请选择开始时间",
            'end_time.required' => "请选择结束时间",
            'prize_date.required' => "请选择开奖时间",
            'signup_num.required' => "请选择参与活动人数"
        ]);
        $starttime = strtotime(request()->input('start_time'));
        $endtime = strtotime(request()->input('end_time'));
        $prize_date = strtotime(request()->input('prize_date'));
        if ($endtime < $starttime) {
            session()->flash('danger', "活动结束时间不能大于开始时间!");
            return redirect()->back();
        } elseif ($prize_date < $endtime) {
            session()->flash('danger', "活动开奖时间不能小于活动结束时间!");
            return redirect()->back();
        } else {
            $event->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'signup_start' => $starttime,
                'signup_up' => $endtime,
                'prize_date' => $request->input('prize_date'),
                'signup_num' => $request->input('signup_num'),
                'is_prize' => 0
            ]);
            session()->flash('success', "修改成功!");
            return redirect(route('event.index'));
        }
    }

    //删除
    public function destroy(Event $event)
    {
        $time = time();
        if ($time > strtotime($event->prize_date)) {
            session()->flash('danger', "活动已经开奖！无法删除!");
            return redirect(route('event.index'));
        }
        $id=$event->id;
        $eventprize=EventPrize::where('events_id',$id)->first();
        $eventprize->delete();
        $event->delete();
        session()->flash('success', "删除成功！!");
        return redirect(route('event.index'));
    }
}
