@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin-groups.create') }}"><i class="fa fa-plus"></i> <span>添加</span></a>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">菜单</h3>

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
                        <th class="text-center">用户组名称</th>
                        <th class="text-center">状态</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($groups as $group)
                    <tr>
                        <td class="text-right">{{ $group->id }}</td>
                        <td class="text-center">{{ $group->name }}</td>
                        <td class="text-center"><span>{{ $group->status }}</span></td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-xs" href="{{ route('admin-groups.edit', ['id' => $group->id]) }}"><i class="fa fa-edit"></i> <span>编辑</span></a>
                            <form action="{{ route('admin-groups.destroy', $group->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('确定要删除?');">
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
