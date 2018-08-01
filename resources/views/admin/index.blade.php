@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>管理员名称：</th>
                <th>邮箱：</th>
                <th>创建时间：</th>
                <th>操作：</th>
            </tr>
            @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->created_at }}</td>
                <td>
                    <a href="{{ route('admin.edit',[$admin]) }}" class="btn btn-info">编辑</a>
                    <form method="post" action="{{ route('admin.destroy',[$admin]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('admin.create') }}" class="btn btn-success">添加后台管理员</a>
    </div>
@endsection 