@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">图片详情</h3>
                    <a class="btn btn-default" href="{{ route('images.show', $image->id - 1) }}"><i class="fa fa-arrow-left"></i> <span>上一张</span></a>
                    <a class="btn btn-default" href="{{ route('images.show', $image->id + 1) }}"><span>下一张</span> <i class="fa fa-arrow-right"></i></a>
                </div>
                <!-- /.box-header -->
                <!-- start -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">原始图片名</th>
                            <th class="text-center">图片名</th>
                            <th class="text-center">描述</th>
                            <th class="text-center">路径</th>
                            <th class="text-center">上传时间</th>
                            <th class="text-center">修改时间</th>
                        </tr>
                        <tr>
                            <td class="text-right">{{ $image->id }}</td>
                            <td class="text-center"><span>{{ $image->original_name }}</span></td>
                            <td class="text-center"><span>{{ $image->name }}</span></td>
                            <td class="text-center">{{ $image->description }}</td>
                            <td class="text-center">{{ $image->path }}</td>
                            <td class="text-center"><span>{{ $image->created_at }}</span></td>
                            <td class="text-center"><span>{{ $image->updated_at }}</span></td>
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
                                <img class="img-responsive pad" src="{{ config('filesystems.disks.image.url') . '/' . $image->path }}" width="960px">
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>

                <div class="box-footer">
                    <a class="btn btn-default" href="{{ route('images') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

