@extends('default')
@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>注册</h5>
            </div>
            @include('_errors')
            <div class="panel-body">
                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">用户名:</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="请输入用户名" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">密码:</label>
                        <input type="text" id="password" class="form-control" name="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <label for="repassword">确认密码:</label>
                        <input type="text" id="repassword" class="form-control" name="password_confirmation" placeholder="请确认您的密码">
                    </div>
                    @foreach($roles as $role)
                        <label class="checkbox-inline">
                        <input type="checkbox" name="role[]" value="{{ $role->name }}">{{ $role->name }}
                        </label>
                    @endforeach
                    <div class="form-group">
                        <label for="email">邮箱:</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="请输入你的邮箱" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>店铺名:</label>
                        <input type="text" id="exampleInputPassword1" name="shop_name" class="form-control" placeholder="请输入店铺名" value="{{ old('shop_name') }}">
                    </div>
                    <div class="form-group">
                        <label>所属类别:</label>
                        <select name="shop_category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">店铺图片:</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="logo" value="{{ old('logo') }}">
                    </div>
                    <div class="form-group">
                        <label>店铺评分:</label>
                        <input type="number" class="form-control" name="shop_rating" value="{{ old('shop_rating') }}">
                    </div>
                    <div class="checkbox">
                        <label>是否名牌:</label>
                        <label>
                            <input type="radio" name="brand" value="1" checked>
                            是
                        </label>
                        <label>
                            <input type="radio" name="brand" value="0">
                            否
                        </label>
                    </div>



                    <div class="checkbox">
                        <label>是否准时送达:</label>
                        <label>
                            <input type="radio" name="zhun" value="1" checked>
                            是
                        </label>
                        <label>
                            <input type="radio" name="zhun"  value="0">
                            否
                        </label>
                    </div>





                    <div class="checkbox">
                        <label>是否蜂鸟配送:</label>
                        <label>
                            <input type="radio" name="fengniao" value="1" checked>
                            是
                        </label>
                        <label><input type="radio" name="fengniao" value="0">
                            否
                        </label>
                    </div>




                    <div class="checkbox">
                        <label> 是否保:</label>
                        <label>
                            <input type="radio" name="bao" value="1" checked>
                            是
                        </label>
                        <label>
                            <input type="radio" name="bao" value="0">
                            否
                        </label>
                    </div>



                    <div class="checkbox">
                        <label> 是否提供发票:</label>
                        <label>
                            <input type="radio" name="piao" value="1" checked>
                            是
                        </label>
                        <label>
                            <input type="radio" name="piao" value="0">
                            否
                        </label>
                    </div>


                    <div class="checkbox">
                        <label>是否准:</label>
                        <label>
                            <input type="radio" name="zhunzhun" value="1" checked>
                            是
                        </label>
                        <label>
                            <input type="radio" name="zhunzhun" value="0">
                            否
                        </label>
                    </div>

                    <br>

                    <div class="form-group">
                        <label>起送金额:</label>
                        <input type="number" name="qisong" class="form-control" value="{{ old('qisong') }}">
                    </div>

                    <div class="form-group">
                        <label>配送金额:</label>
                        <input type="number" name="peisong"  class="form-control" value="{{ old('peisong') }}">
                    </div>
                    店铺公告:
                    <div>
                        <textarea name="gonggao" class="form-control" cols="30" rows="10">{{ old('gonggao') }}</textarea>
                    </div>

                    优惠信息:
                    <div>
                        <textarea name="youhui" class="form-control" cols="30" rows="10">{{ old('youhui') }}</textarea>
                    </div>

                    <label>
                        <input type="hidden" name="status" value="1">
                    </label>
                    <button type="submit" class="btn btn-success">提交</button>
                </form>
            </div>

        </div>


    </div>

@endsection