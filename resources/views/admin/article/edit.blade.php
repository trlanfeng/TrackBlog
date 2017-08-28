@extends('admin.layout')

@section('page')
    <form action="{{isset($article->id) ? url('/admin/article/'.$article->id) : url('/admin/article')}}" method="POST">
        {{csrf_field()}}
        @if(isset($article->id))
            {{method_field('PUT')}}
        @endif
        <div class="form-group">
            <label for="title">栏目：</label>
            <select data-placeholder="选择一个宠物..." class="chosen-select form-control" tabindex="2">
                @foreach($categorys as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">栏目</label>
            <input type="text" class="form-control" name="category_id">
        </div>
        <div class="form-group">
            <label for="title">标题：</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$article->title or ''}}">
        </div>
        <div class="form-group">
            <label for="title">关键字：</label>
            <input type="text" class="form-control" id="keywords" name="keywords" value="{{$article->keywords or ''}}">
        </div>
        <div class="form-group">
            <label for="title">描述：</label>
            <textarea type="text" class="form-control" id="description" name="description">{{$article->description or ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">内容：</label>
            <input type="text" class="form-control" id="content" name="content" value="{{$article->content or ''}}">
        </div>
        <script id="container" name="content" type="text/plain">
            这里写你的初始化内容
        </script>
        <script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
        <script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
        <script type="text/javascript">
            var ue = UE.getEditor('container');
        </script>
        <div class="form-group">
            <label for="title">缩略图：</label>
            <input type="text" class="form-control" id="thumb_url" name="thumb_url" value="{{$article->thumb_url or ''}}">
        </div>
        <div class="form-group">
            <label for="title">排序：</label>
            <input type="text" class="form-control" id="orders" name="orders" value="{{$article->orders or ''}}">
        </div>
        <div class="form-group">
            <label for="title">评论：</label>
            <input type="text" class="form-control" id="allow_comment" name="allow_comment" value="{{$article->allow_comment or ''}}">
        </div>
        <div class="switch">
            <input type="checkbox">
            <label>允许评论</label>
        </div>
        <div class="form-group">
            <label for="title">标签：</label>
            <input type="hidden" id="tags" name="tags" value="">
            <select id="select-state" name="state[]" multiple class="demo-default"  placeholder="选择一个标签...">
                <option value="">Select a state...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="WY" selected>Wyoming</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">标签</label>
            <input type="text" class="form-control" name="tags">
        </div>
        <div class="form-group">
            <label for="">状态</label>
            <input type="text" class="form-control" name="status">
        </div>
        <div class="form-group">
            <label for="title">链接：</label>
            <input type="text" class="form-control" id="link" name="link" value="{{$article->link or ''}}">
        </div>
        <div class="form-group">
            <label for="title">发布时间：</label>
            <input type="text" class="form-control publish_time" id="created_at" name="created_at" value="{{$article->created_at or ''}}">
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="reset" class="btn btn-danger">重置</button>
    </form>
@endsection

@section('script')
    <link rel="stylesheet" href="{{asset('laydate/theme/default/laydate.css')}}">
    <script src="{{asset('laydate/laydate.js')}}"></script>
    <script>
        laydate.render({
            elem: '.publish_time'
            ,type: 'datetime'
        });
    </script>
    <link href="{{asset('selectize/css/selectize.default.css')}}" rel="stylesheet">
    <script src="{{asset('selectize/js/selectize.min.js')}}"></script>
    <script>
        $('')
        $('#select-state').selectize({
            plugins: ['remove_button'],
            create: true,
            sortField: 'text'
        });
    </script>
    <link href="{{asset('zui/lib/chosen/chosen.min.css')}}" rel="stylesheet">
    <script src="{{asset('zui/lib/chosen/chosen.min.js')}}"></script>
    <script>
        $('select.chosen-select').chosen({
            no_results_text: '没有找到',    // 当检索时没有找到匹配项时显示的提示文本
            disable_search_threshold: 10, // 10 个以下的选择项则不显示检索框
            search_contains: true         // 从任意位置开始检索
        });
    </script>
@endsection