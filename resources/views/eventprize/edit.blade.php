@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('eventprize.update',[$eventprize->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            @include('_errors')
            <div>
                <label>奖品名称：:</label>
                <input type="text" class="form-control" name="name" value="{{ $eventprize->name }}">
            </div>
            <div>
                <label>奖品详情:</label>
                <textarea name="description" cols="30" rows="10" class="form-control">{{ $eventprize->description }}</textarea>
            </div>

            <div>
                <div>所属活动：</div>
                <select name="event_id" id="">
                        <option value="{{ $event->id }}" class="form-control">{{ $event->title }}</option>
                </select>
            </div>

            <div>
                <label>数量：</label>
                <input type="number" name="num" class="form-control" value="{{ $eventprize->num }}">
            </div>
            <div>
                <input type="submit" value="确认修改" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection