<?php namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index()
    {
        $article=Article::where('status',0)->get();
        return view('user.article.index')->with('articles',$article);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->slug=explode(",",$article->slug);
        $article->last_reply=$article->comment->get(0)->created_at;
        return view('user.article.show')->with('article', $article);
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
