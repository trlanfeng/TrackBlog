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
                            <li><a href="{{url('/admin/articles/')}}">文章</a></li>
                            <li><a href="{{url('/admin/categorys/')}}">栏目</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        @show
    </div>
    <div class="page">
        <div class="container-fluid">
            @yield('page')
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
