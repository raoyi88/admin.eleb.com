@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td>
                    <a href="{{route('all')}}" class="btn btn-success">全部文章</a>
                </td>
                <td>
                    <a href="{{ route('ongoing') }}" class="btn btn-success">进行中</a>
                </td>
                <td>
                    <a href="{{ route('overdue') }}" class="btn btn-success">已过期</a>
                </td>
            </tr>
            <tr>
                <th>活动名称</th>
                <th>活动详情</th>
                <th>开始时间</th>
                <th>结束时间</th>
                <th>操作</th>
            </tr>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->content }}</td>
                    <td>{{ date('Y-m-d H:i:s',$activity->start_time) }}</td>
                    <td>{{ date('Y-m-d H:i:s',$activity->end_time) }}</td>
                    <td>
                        <a href="{{ route('activity.edit',[$activity]) }}" class="btn btn-success">修改</a>
                        <form method="post" action="{{ route('activity.destroy',[$activity]) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('activity.create') }}" class="btn btn-info">添加活动</a>
    </div>
@endsection