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
        $articles = Article::orderBy('id','desc')->paginate(15);
        return view('admin/article/list',compact('articles'));
    }

    public function show(\App\Article $article=null)
    {
        $categorys = Category::all();
        return view('admin/article/edit',compact('article','categorys'));
    }

    public function  edit(\App\Article $article=null)
    {
        if ($article === null) {
            $article = new Article();
        }
        $article->title = \request('title');
        $article->keywords = \request('keywords');
        $article->description = \request('description');
        $article->content = \request('content');
        $article->thumb_url = \request('thumb_url');
        $article->category_id = \request('category_id');
        $article->orders = \request('orders');
        $article->allow_comment = \request('allow_comment');
        $article->author_id = \request('author_id');
        $article->alias = \request('alias');
        $article->status = \request('status');
        $article->link = \request('link');
        $article->updated_at = date('Y-m-d H:i:s',time());

        $article->save();

        return redirect('/admin/articles');
    }

    public function delete()
    {

    }
}
