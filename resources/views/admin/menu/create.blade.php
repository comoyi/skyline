@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">添加菜单</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{ route('menus.store') }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label>父级菜单</label>
                            <select class="form-control" name="pid">
                                <option value="0">顶级菜单</option>
                                @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">菜单名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="菜单名称">
                        </div>
                        <div class="form-group">
                            <label>URI</label>
                            <select class="form-control" name="uri">
                                <option value="">空</option>
                                @foreach($routes as $route)
                                    <option value="{{ $route->uri }}"> @if(isset($route->action['as'])) name: {{ $route->action['as'] }} @else path: {{ $route->uri }} @endif</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="icon">图标</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="图标">
                        </div>
                        <div class="form-group">
                            <label for="priority">优先级</label>
                            <input type="text" class="form-control" id="priority" name="priority" placeholder="优先级">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span>添加</span></button>
                        <a class="btn btn-default pull-right" href="{{ route('menus') }}"><i class="fa fa-reply"></i> <span>返回</span></a>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
