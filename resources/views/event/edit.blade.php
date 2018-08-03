@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('event.update',$event) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('_errors')
            <div>
                <label>活动标题:</label>
                <input type="text" class="form-control" name="title" value="{{ $event->title }}">
            </div>
            <div>
                <label>活动内容:</label>

                <textarea name="content" cols="30" rows="10" class="form-control">{{ $event->content }}</textarea>
            </div>
            <div>
                <label>开始报名时间:</label>
                <input type="date" name="start_time" class="form-control" value="{{ date('Y-m-d',$event->signup_start) }}">
            </div>
            <div>
                <label>报名截止时间:</label>
                <input type="date" name="end_time" class="form-control" value="{{ date('Y-m-d',$event->signup_up) }}">
            </div>
            <div>
                <label>开奖时间:</label>
                <input type="date" name="prize_date" class="form-control" value="{{ $event->prize_date }}">
            </div>
            <div>
                <label>报名人数:</label>
                <input type="number" name="signup_num" class="form-control" value="{{ $event->signup_num }}">
            </div>
            <input type="submit" value="确认修改" class="btn btn-success">
        </form>
    </div>
@endsection