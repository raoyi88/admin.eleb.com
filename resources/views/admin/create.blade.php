@extends('header')
@section('content')
    <div class="container">
        <form action="{{ route('admin.store') }}" method="post">
            @include('_errors')
            {{ csrf_field() }}
            <div class="form-group">
                <label>名称：</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>密码：</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>邮箱：</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                @foreach($roles as $role)
                <input type="checkbox" name="role[]" value="{{ $role->name }}">{{ $role->name }}
                @endforeach
            </div>
            <div class="form-group">
                <input type="submit" value="确认添加" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection