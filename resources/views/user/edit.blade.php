@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('user.update',[$user]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>用户名:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label>邮箱:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <input type="submit" value="确认">
            </div>
        </form>
    </div>
@endsection