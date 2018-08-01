@extends('header')
@section('content')
    <div class="container">
        <form action="{{ route('rbac.update',[$permission->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>权限名：</label>
                <input type="text" class="form-control" name="name" value="{{ $permission->name }}">
            </div>
            <input type="submit" value="确认修改" class="btn btn-primary">
        </form>
    </div>
@endsection