@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加用户组</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('admin-groups.store') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">用户组名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="普通用户组">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span>添加</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('admin-groups') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
