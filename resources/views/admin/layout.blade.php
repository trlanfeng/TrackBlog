<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">--}}
    <link href="{{ asset('zui/css/zui.min.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('zui/css/zui-theme.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="admin-app">
    <div class="sidebar">
        @section('sidebar')
            <nav class="menu" data-ride="menu">
                <ul id="treeMenu" class="tree tree-menu" data-ride="tree">
                    <li><a href="#"><i class="icon icon-th"></i>仪表盘</a></li>
                    <li class="open">
                        <a href="#"><i class="icon icon-time"></i>内容管理</a>
                        <ul>
                            <li class="active"><a href="{{url('/admin/articles/')}}"><i class="icon icon-angle-right"></i>文章</a></li>
                            <li><a href="{{url('/admin/categorys/')}}"><i class="icon icon-angle-right"></i>栏目</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        @show
    </div>
    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <form action="">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">姓名</span>
                            <input type="text" class="form-control" placeholder="姓氏">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">姓名</span>
                            <input type="text" class="form-control" placeholder="姓氏">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon">姓名</span>
                            <input type="text" class="form-control" placeholder="姓氏">
                        </div>
                    </div>
                </form>

            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary">新增</button>
                    <button class="btn btn-danger">删除选中</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    @yield('page')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
{{--<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>--}}
<script src="{{ asset('zui/js/zui.min.js') }}"></script>
@yield('script')
</body>
</html>
