@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('event.store') }}" method="post">
            {{ csrf_field() }}
            @include('_errors')
            <div>
                <label>活动标题:</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div>
                <label>活动内容:</label>

                <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div>
                <label>开始报名时间:</label>
                <input type="date" name="start_time" class="form-control">
            </div>
            <div>
                <label>报名截止时间:</label>
                <input type="date" name="end_time" class="form-control">
            </div>
            <div>
                <label>开奖时间:</label>
                <input type="date" name="prize_date" class="form-control">
            </div>
            <div>
                <label>报名人数:</label>
                <input type="number" name="signup_num" class="form-control">
            </div>
            <input type="submit" value="确认添加" class="btn btn-success">
        </form>
    </div>
@endsection