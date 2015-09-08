<?php namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Cache;

class ArticleController extends Controller
{

    public function index()
    {
        $article = Article::where('status', config('DbStatus.article.status'))->get();
        return view('user.article.index')->with('articles', $article);
    }

    public function show($id)
    {
        Article::where('status',config('DbStatus.article.status'))->findOrFail($id);
        $this->upView($id);
        $article = Article::find($id);
        $article->slug = explode(",", $article->slug);
        $article->last_reply = $article->comment->max('created_at');
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

    public function upView($id)
    {
        $ip = \Request::getClientIp();
        $viewName = 'view_' . $id . '_' . ip2long($ip);
        if (!Cache::has($viewName)) {
            $art = Article::find($id);
            $art->view++;
            $art->save();
            Cache::add($viewName, true, config('DbStatus.article.time'));
        }
    }
}
