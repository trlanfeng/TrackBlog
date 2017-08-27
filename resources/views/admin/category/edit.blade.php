@extends('admin.layout')

@section('page')
    <form action="{{isset($category->id) ? url('/admin/category/'.$category->id) : url('/admin/category')}}" method="POST">
        {{csrf_field()}}
        @if(isset($category->id))
            {{method_field('PUT')}}
        @endif
        <div class="form-group">
            <label for="title">父栏目：</label>
            <select data-placeholder="选择一个宠物..." class="chosen-select form-control" tabindex="2">
                @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">父栏目</label>
            <input type="text" class="form-control" name="pid">
        </div>
        <div class="form-group">
            <label for="title">标题：</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$category->title or ''}}">
        </div>
        <div class="form-group">
            <label for="title">关键字：</label>
            <input type="text" class="form-control" id="keywords" name="keywords" value="{{$category->keywords or ''}}">
        </div>
        <div class="form-group">
            <label for="title">描述：</label>
            <textarea type="text" class="form-control" id="description" name="description">{{$category->description or ''}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">缩略图：</label>
            <input type="text" class="form-control" id="thumb_url" name="thumb_url" value="{{$category->thumb_url or ''}}">
        </div>
        <div class="form-group">
            <label for="title">排序：</label>
            <input type="text" class="form-control" id="orders" name="orders" value="{{$category->orders or ''}}">
        </div>
        <div class="form-group">
            <label for="">状态</label>
            <input type="text" class="form-control" name="status">
        </div>
        <div class="form-group">
            <label for="title">链接：</label>
            <input type="text" class="form-control" id="link" name="link" value="{{$category->link or ''}}">
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
        <button type="reset" class="btn btn-danger">重置</button>
    </form>
@endsection

@section('script')
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