@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">后台操作日志</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered">
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">类型</th>
                        <th class="text-center">用户</th>
                        <th class="text-center">ip</th>
                        <th class="text-center">时间</th>
                        <th class="text-center">详情</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($logs as $log)
                    <tr>
                        <td class="text-right">{{ $log->id }}</td>
                        <td class="text-center"><span>{{ $log->log_type_id }}</span></td>
                        <td class="text-center">{{ $log->user_id }}</td>
                        <td class="text-center"><span>{{ long2ip($log->ip) }}</span></td>
                        <td class="text-center"><span>{{ $log->created_at }}</span></td>
                        <td class="text-center"><span>{{ $log->detail }}</span></td>
                        <td class="text-center">
                            <a class="btn btn-default btn-xs" href="{{ route('logs.show', ['id' => $log->id]) }}"><i class="fa fa-search"></i> <span>查看</span></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            {{ $logs->links() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
