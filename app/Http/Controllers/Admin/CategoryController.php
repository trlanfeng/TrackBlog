<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categorys = Category::orderBy('id','desc')->paginate(15);
        return view('admin/category/list',compact('categorys'));
    }

    public function show(\App\Category $category=null)
    {
        $categorys = Category::all();
        return view('admin/category/edit',compact('category','categorys'));
    }

    public function  edit(\App\Category $category=null)
    {
        if ($category === null) {
            $category = new Article();
        }
        $category->title = \request('title');
        $category->keywords = \request('keywords');
        $category->description = \request('description');
        $category->thumb_url = \request('thumb_url');
        $category->pid = \request('pid');
        $category->orders = \request('orders');
        $category->alias = \request('alias');
        $category->status = \request('status');
        $category->link = \request('link');
        $category->updated_at = date('Y-m-d H:i:s',time());

        $category->save();

        return redirect('/admin/categorys');
    }

    public function delete()
    {

    }
}
