@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">日志详情</h3>
                    <a class="btn btn-default" href="{{ route('logs.show', ['id' => $log->id - 1]) }}"><i class="fa fa-arrow-left"></i> <span>上一条</span></a>
                    <a class="btn btn-default" href="{{ route('logs.show', ['id' => $log->id + 1]) }}"><span>下一条</span> <i class="fa fa-arrow-right"></i></a>
                </div>
                <!-- /.box-header -->
                <!-- start -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">类型</th>
                            <th class="text-center">用户</th>
                            <th class="text-center">ip</th>
                            <th class="text-center">时间</th>
                        </tr>
                        <tr>
                            <td class="text-right">{{ $log->id }}</td>
                            <td class="text-center"><span>{{ $log->log_type_id }}</span></td>
                            <td class="text-center">{{ $log->user_id }}</td>
                            <td class="text-center"><span>{{ long2ip($log->ip) }}</span></td>
                            <td class="text-center"><span>{{ $log->created_at }}</span></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="box-header with-border">
                                <h3 class="box-title">详细信息</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <span>{{ $log->detail }}</span>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('logs') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
