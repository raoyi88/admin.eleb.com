@extends('header')
@section('content')
    <div class="container">
        <table class="table">
            <tr>
                <th>角色：</th>
                <th>创建时间：</th>
                <th>操作：</th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        <a href="{{ route('roles.edit',[$role->id]) }}" class="btn btn-info">编辑</a>
                        <form method="post" action="{{ route('roles.destroy',[$role->id]) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger">删除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('roles.create') }}" class="btn btn-success">添加角色</a>
    </div>
@endsection