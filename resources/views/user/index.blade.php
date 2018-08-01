@extends('header')
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>用户名</th>
            <th>邮箱</th>
            <th>创建时间</th>
            {{--<th>商铺</th>--}}
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                {{--<td>{{ $user->getname->shop_name }}</td>--}}
                <td>{{ $user->status?"审核通过":"待审核" }}</td>
                <td>
                    <a href="{{ route('user.edit',[$user]) }}" class="btn btn-info">编辑</a>
                    <a href="{{ route('user.show',[$user->shop_id]) }}" class="btn btn-primary">查看</a>
                    <form method="post" action="{{ route('user.destroy',[$user]) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('user.create') }}" class="btn  btn-success">添加管理员</a>
    {{ $users->links() }}
</div>
@endsection