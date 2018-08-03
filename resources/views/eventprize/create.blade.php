@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('eventprize.store') }}" method="post">
            {{ csrf_field() }}
            @include('_errors')
            <div>
                <label>奖品名称：:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div>
                <label>奖品详情:</label>
                <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div>
                <div>所属活动：</div>
                <select name="event_id" id="">
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" class="form-control">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label>数量：</label>
                <input type="number" name="num" class="form-control">
            </div>
            <div>
            <input type="submit" value="确认添加" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection