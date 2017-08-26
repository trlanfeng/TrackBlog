<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::all();
        return view('admin/article/list',compact('articles'));
    }

    public function show(\App\Article $article=null)
    {
        $categorys = Category::all();
        return view('admin/article/edit',compact('article','categorys'));
    }

    public function  edit(\App\Article $article=null)
    {
        return view('admin/article/edit');
    }

    public function delete()
    {

    }
}
