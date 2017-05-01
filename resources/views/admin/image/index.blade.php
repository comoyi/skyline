@extends('admin.layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-primary" href="{{ route('images.create') }}"><i class="fa fa-plus"></i> <span>添加</span></a>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">图片列表</h3>

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
                        <th class="text-center">图片</th>
                        <th class="text-center">图片名</th>
                        <th class="text-center">描述</th>
                        <th class="text-center">操作</th>
                    </tr>
                    @foreach($images as $image)
                    <tr>
                        <td class="text-right">{{ $image->id }}</td>
                        <td class="text-center"><a href="{{ config('filesystems.disks.image.url') . '/' . $image->path }}" target="_blank"><img src="{{ config('filesystems.disks.image.url') . '/' . $image->path }}" width="128px"></a></td>
                        <td class="text-center">{{ $image->name }}</td>
                        <td class="text-center">{{ $image->description }}</td>
                        <td class="text-center">
                            <a class="btn btn-default btn-xs" href="{{ route('images.show', ['id' => $image->id]) }}"><i class="fa fa-search"></i> <span>查看</span></a>
                            <a class="btn btn-warning btn-xs" href="{{ route('images.edit', ['id' => $image->id]) }}"><i class="fa fa-edit"></i> <span>编辑</span></a>
                            <form action="{{ route('images.destroy', ['id' => $image->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('确定要删除?');">
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> 删除</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            {{ $images->links() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection
