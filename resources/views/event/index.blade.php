@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>活动名称</th>
                {{--<th>活动详情</th>--}}
                <th>开始时间</th>
                <th>结束时间</th>
                <th>开奖时间</th>
                <th>可参与人数</th>
                <th>活动状态</th>
                <th>操作</th>
            </tr>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    {{--<td>{{ $event->content }}</td>--}}
                    <td>{{ date('Y-m-d',$event->signup_start) }}</td>
                    <td>{{ date('Y-m-d',$event->signup_up) }}</td>
                    <td>{{ $event->prize_date }}</td>
                    <td>{{ $event->signup_num }}</td>
                    <td>{{ $event->is_prize==0?"未开奖":"已开奖" }}</td>
                    <td>
                        <a href="{{ route('event.show',[$event]) }}" class="btn btn-info">查看</a>
                        <a href="{{ route('event.edit',[$event]) }}" class="btn btn-success">修改</a>
                        <form method="post" action="{{ route('event.destroy',[$event]) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('event.create') }}" class="btn btn-info">添加活动</a>
    </div>
@endsection