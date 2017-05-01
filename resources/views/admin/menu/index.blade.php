@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('menus.create') }}"><i class="fa fa-plus"></i> <span>添加</span></a>
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
                <table class="table table-hover">
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">pid</th>
                        <th class="text-center">菜单名称</th>
                        <th class="text-center">URI</th>
                        <th class="text-center">图标</th>
                        <th class="text-center">优先级</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($menus as $menu)
                    <tr>
                        <td class="text-right">{{ $menu->id }}</td>
                        <td class="text-center">{{ $menu->pid }}</td>
                        <td class="text-center">{{ $menu->name }}</td>
                        <td class="text-left">
                            @if(!empty($menu->uri))
                                <a href="{{ url($menu->uri) }}"><i class="fa fa-link"></i></a>
                            @endif
                            <span>{{ $menu->uri }}</span>
                        </td>
                        <td class="text-left"><i class="{{ $menu->icon }}"></i> <span>{{ $menu->icon }}</span></td>
                        <td class="text-center">{{ $menu->priority }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning btn-xs" href="{{ route('menus.edit', ['id' => $menu->id]) }}"><i class="fa fa-edit"></i> <span>编辑</span></a>
                            <form action="{{ route('menus.destroy', ['id' => $menu->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('确定要删除?');">
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
