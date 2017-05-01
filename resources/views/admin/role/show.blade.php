@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">权限详情</h3>
                    <a class="btn btn-default" href="{{ route('roles.show', ['id' => $role->id - 1]) }}"><i class="fa fa-arrow-left"></i> <span>上一个</span></a>
                    <a class="btn btn-default" href="{{ route('roles.show', ['id' => $role->id + 1]) }}"><span>下一个</span> <i class="fa fa-arrow-right"></i></a>
                </div>
                <!-- /.box-header -->
                <!-- start -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">角色</th>
                            <th class="text-center">角色名</th>
                            <th class="text-center">描述</th>
                            <th class="text-center">提交时间</th>
                            <th class="text-center">修改时间</th>
                        </tr>
                        <tr>
                            <td class="text-right">{{ $role->id }}</td>
                            <td class="text-center"><span>{{ $role->name }}</span></td>
                            <td class="text-center"><span>{{ $role->display_name }}</span></td>
                            <td class="text-center"><span>{{ $role->description }}</span></td>
                            <td class="text-center"><span>{{ $role->created_at }}</span></td>
                            <td class="text-center"><span>{{ $role->updated_at }}</span></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="box-header with-border">
                                <h3 class="box-title">描述</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span>{{ $role->description }}</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('roles') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
