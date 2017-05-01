@extends('admin.layouts.layout')

@section('page-css')
<style>
    .mouse-pointer {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加用户</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('admin-users.store') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username">帐号</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="张三">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="******">
                        </div>
                        <div class="form-group">
                            <label>用户组</label>
                            <select class="form-control" name="group_id">
                                <option value="0">无</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="张三">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="xxx@xx.com">
                        </div>
                        <div class="form-group">
                            <label for="mobile">手机</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="15868812345">
                        </div>
                        <div class="form-group">
                            <label for="phone">座机</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="0571-81234567">
                        </div>
                        <div class="form-group">
                            <label for="sex">性别</label>
                            <label class="mouse-pointer">
                                <input type="radio" name="sex" class="minimal" value="1" checked>
                                <span>男</span>
                            </label>
                            <label class="mouse-pointer">
                                <input type="radio" name="sex" class="minimal" value="0">
                                <span>女</span>
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span>添加</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('admin-users') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
