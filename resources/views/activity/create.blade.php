@extends('default')
@section('content')
    <div class="container">
        <form action="{{ route('activity.store') }}" method="post">
            {{ csrf_field() }}
            @include('_errors')
            <div>
                <label>活动标题:</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div>
                <label>活动内容:</label>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>
                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain"></script>
            </div>
            <div>
                <label>开始时间:</label>
                <input type="date" name="start_time" class="form-control">
            </div>
            <div>
                <label>结束时间:</label>
                <input type="date" name="end_time" class="form-control">
            </div>
            <input type="submit" value="确认添加">
        </form>
    </div>
@endsection