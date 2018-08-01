@extends('header')
@section('content')
    <div class="container">
        <form action="{{ route('roles.store') }}" method="post">
            @include('_errors')
            {{ csrf_field() }}
            <div class="form-group">
                <h3> 角色名：</h3>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                @foreach($permissions as $permission)
                <label class="checkbox-inline">
                    <input type="checkbox" id="inlineCheckbox1" name="permission[]" value="{{ $permission->name }}"> {{ $permission->name }}
                </label>
                @endforeach
            </div>
            <div class="form-group">
                <input type="submit" value="确认" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection