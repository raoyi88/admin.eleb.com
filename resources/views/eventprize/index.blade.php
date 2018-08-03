@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>奖品名：</th>
                <th>数量：</th>
                <th>所属活动：</th>
                <th>创建时间：</th>
                <th>操作</th>
            </tr>
            @foreach($eventprizes as $eventprize)
            <tr>
                <td>{{ $eventprize->name }}</td>
                <td>{{ $eventprize->num }}</td>
                <td>{{ $eventprize->getname->title }}</td>
                <td>{{ $eventprize->created_at }}</td>
                <td>
                    <a href="{{ route('eventprize.show',[$eventprize->id]) }}" class="btn btn-info">查看</a>
                    <a href="{{ route('eventprize.edit',[$eventprize->id]) }}" class="btn btn-primary">修改</a>
                    <form method="post" action="{{ route('eventprize.destroy',[$eventprize]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
                @endforeach
        </table>
        <a href="{{ route('eventprize.create') }}" class="btn btn-success">添加</a>
    </div>
@endsection