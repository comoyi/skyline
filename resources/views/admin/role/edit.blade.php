@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">编辑角色</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('roles.update', ['id' => $role->id]) }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">角色</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="角色" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label for="display_name">角色名</label>
                            <input type="text" class="form-control" id="display_name" name="display_name" placeholder="角色名" value="{{ $role->display_name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">描述</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ $role->description }}">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <span>更新</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('roles') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
