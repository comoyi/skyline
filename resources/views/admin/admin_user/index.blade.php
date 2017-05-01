@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('admin-users.create') }}"><i class="fa fa-plus"></i> <span>添加</span></a>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">用户首页</h3>

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
                        <th class="text-center">名称</th>
                        <th class="text-center">用户组</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">手机</th>
                        <th class="text-center">座机</th>
                        <th class="text-center">性别</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-right">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">
                            @foreach($groups as $group)
                                @if($group->id === $user->group_id)
                                    <span>{{ $group->name }}</span>
                                    @break
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->mobile }}</td>
                        <td class="text-center">{{ $user->phone }}</td>
                        <td class="text-center">
                            @if($user->sex == 1)
                                <span>男</span>
                            @else
                                <span>女</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-xs" href="{{ route('admin-users.edit', ['id' => $user->id]) }}"><i class="fa fa-edit"></i> <span>编辑</span></a>
                            <form action="{{ route('admin-users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('确定要删除?');">
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
