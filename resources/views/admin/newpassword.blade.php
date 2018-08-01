@extends('default')
@section('content')
    <div class="panel-body">
        <div class="container">
            <form action="{{ route('newpass') }}" method="post">
                @include('_errors')
                {{ csrf_field() }}
                <div class="form-group">
                    <label>旧密码:</label>
                    <input type="password" name="oldpassword" class="form-control">
                </div>
                <div class="form-group ">
                    <label>新密码:</label>
                    <input type="password" name="newpassword" class="form-control">
                </div>
                <div class="form-group">
                    <label>确认密码:</label>
                    <input type="password" name="repassword" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-default">
                </div>
            </form>
        </div>
    </div>
@endsection