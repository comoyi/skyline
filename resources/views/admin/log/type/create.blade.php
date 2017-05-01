@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加日志类型</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('log.types.store') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="type">类型</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="类型">
                        </div>
                        <div class="form-group">
                            <label for="description">类型说明</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="类型说明">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span>添加</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('log.types') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
