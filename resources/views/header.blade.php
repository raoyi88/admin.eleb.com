@extends('default')
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('activity.index') }}">文章列表:</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="">店铺列表 <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ route('user.index') }}">商铺管理员列表</a></li>
                    <li><a href="{{ route('rbac.index') }}">权限管理</a></li>
                    <li><a href="{{ route('roles.index') }}">角色管理</a></li>
                </ul>
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户信息 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="{{ route('editpassword') }}" method="post">
                                    {{ csrf_field() }}
                                    <button class="btn btn-link">修改密码</button>
                                </form>
                            </li>
                            <li><a href="{{ route('admin.index') }}">后台管理员</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-link">注销</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>