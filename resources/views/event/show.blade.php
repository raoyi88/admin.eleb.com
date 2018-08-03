@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th class="text-center">活动名称</th>
            </tr>
            <tr>
                <td>{{ $event->title }}</td>
            </tr>
            <tr>
                <th class="text-center">活动内容</th>
            </tr>
            <tr>
                <td>{{ $event->content }}</td>
            </tr>
        </table>
        <a href="{{ route('event.create') }}" class="btn btn-info">添加活动</a>
    </div>
@endsection