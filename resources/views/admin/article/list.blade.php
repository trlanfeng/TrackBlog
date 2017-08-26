@extends('admin.layout')

@section('page')
    <table class="table datatable">
        <thead>
        <tr>
            <th>ID</th>
            <th class="flex-col">标题</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->status}}</td>
                    <td>
                        <a href="#"><i class="icon-ok-sign"></i></a>
                        &nbsp;
                        <a href="#" class="text-danger"><i class="icon-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <ul>

    </ul>
@endsection

@section('script')
    <link rel="stylesheet" href="{{asset('zui/lib/datatable/zui.datatable.min.css')}}">
    <script src="{{asset('zui/lib/datatable/zui.datatable.min.js')}}"></script>
    <script>
        $(function(){
            $('table.datatable').datatable({
                checkable: true,
                fixedLeftWidth: 100,
                fixedRightWidth: 200
            });
        })
    </script>
@endsection