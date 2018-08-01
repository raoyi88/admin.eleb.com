@extends('default')
@section('content')
        <div class="container">
            <table class="table">
                <tr>
                    <th>活动名称</th>
                    <th>活动详情</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                </tr>
                @foreach($activities as $activity)
                    <tr>
                        <td>{{ $activity->title }}</td>
                        <td>{{ $activity->content }}</td>
                        <td>{{ date('Y-m-d H:i:s',$activity->start_time) }}</td>
                        <td>{{ date('Y-m-d H:i:s',$activity->end_time) }}</td>
                    </tr>
                @endforeach
            </table></div>
@endsection