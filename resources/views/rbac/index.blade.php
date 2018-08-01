@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>权限名：</th>
                <th>创建时间：</th>
                <th>操作：</th>
            </tr>
            @foreach($rbacs as $rbac)
            <tr>
                <td>{{ $rbac->name }}</td>
                <td>{{ $rbac->created_at }}</td>
                <td>
                    <a href="{{ route('rbac.edit',[$rbac->id]) }}" class="btn btn-info">编辑</a>
                    <form method="post" action="{{ route('rbac.destroy',[$rbac->id]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
                @endforeach
        </table>
        <a href="{{ route('rbac.create') }}" class="btn btn-success">添加权限</a>
    </div>
@endsection