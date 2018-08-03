@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <td>奖品名：</td>
                <td>{{ $eventprize->name  }}</td>
            </tr>
            <tr>
                <td>奖品详情：</td>
                <td>{{ $eventprize->description  }}</td>
            </tr>
            <tr>
                <td>奖品数量：</td>
                <td>{{ $eventprize->num  }}</td>
            </tr>
        </table>
    </div>
@endsection