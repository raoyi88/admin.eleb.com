@extends('header')
@section('content')
    <div class="container">
        <form action="{{ route('admin.update',[$admin]) }}" method="post">
            @include('_errors')
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>名称：</label>
                <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label>邮箱：</label>
                <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
            </div>
            <div class="form-group">
                <input type="submit" value="确认修改" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection