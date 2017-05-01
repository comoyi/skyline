@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">编辑图片</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('images.update', ['id' => $image->id]) }}" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">图片名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="图片名" value="{{ $image->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description">描述</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ $image->description }}">
                        </div>
                        <div class="form-group">
                            <label for="file">文件</label>
                            <input type="file" id="file" name="file">
                            <p class="help-block">请选择上传的文件</p>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <div class="box-header with-border">
                                    <h3 class="box-title">缩略图</h3>
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
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <span>更新</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('images') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
