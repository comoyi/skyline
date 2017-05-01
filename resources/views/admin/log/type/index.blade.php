@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('log.types.create') }}"><i class="fa fa-plus"></i> <span>添加</span></a>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">操作日志类型</h3>

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
                        <th class="text-center">类型描述</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($logTypes as $logType)
                    <tr>
                        <td class="text-right">{{ $logType->id }}</td>
                        <td class="text-center"><span>{{ $logType->type }}</span></td>
                        <td class="text-center"><span>{{ $logType->description }}</span></td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-xs" href="{{ route('log.types.edit', ['id' => $logType->id]) }}"><i class="fa fa-edit"></i> <span>编辑</span></a>
                            <form action="{{ route('log.types.destroy', $logType->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('确定要删除?');">
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> 删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
