@extends('header')
@section('content')
    <div class="container">
        <form action="{{ route('rbac.store') }}" method="post">
            @include('_errors')
            {{ csrf_field() }}
            <div class="form-group">
                <h3> 权限名：</h3>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="确认" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection