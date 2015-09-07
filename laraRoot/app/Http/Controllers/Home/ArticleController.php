<?php namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index()
    {
        return view('user.article.index');
    }

    public function show($id)
    {
//        $article = Article::findOrFail($id);
//        if($article==null){
//            abort('404');
//        }
//        return view('user.article.article')->with('article', $article);
        return view('user.article.show');
    }

    public function create()
    {
        return view('user.article.create');
    }

    public function store()
    {
        return 'article保存';
    }

    public function edit()
    {
        return view('user.article.edit');
    }

    public function update()
    {
        return 'article更新';
    }

    public function destroy()
    {
        return 'article删除';
    }
}
