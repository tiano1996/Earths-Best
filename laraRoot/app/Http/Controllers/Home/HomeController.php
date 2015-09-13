<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;

class HomeController extends Controller
{

    /*
     *	首页
     *	with article model
     */
    public function index()
    {
        $articles = Article::with('comment')
            ->select(['id', 'title', 'slug', 'view', 'introduction', 'updated_at', 'created_at'])
            ->where('status', config('DbStatus.article.status'))->paginate(10);
        $list = array();
        foreach ($articles as $v) {
            $v->slug = str_replace('，', ',', $v->slug);
            $list = array_merge($list, explode(',', $v->slug));
            $v->last_reply = $v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.index')
            ->with('articles', $articles)->with('tags', $tags)->with('tops', ArticleController::getTop10());
    }

    public function tagList($name = null)
    {
        if ($name != null)
            $articles = Article::with('comment')->select(['id', 'title', 'slug', 'view', 'introduction', 'updated_at', 'created_at'])
                ->where('status', config('DbStatus.article.status'))->where('slug', 'like', '%' . $name . '%')->paginate(10);
        else
            $articles = Article::with('comment')->select(['id', 'title', 'slug', 'view', 'introduction', 'updated_at', 'created_at'])
                ->where('status', config('DbStatus.article.status'))->paginate(10);
        $list = array();
        foreach ($articles as $v) {
            $v->slug = str_replace('，', ',', $v->slug);
            $list = array_merge($list, explode(',', $v->slug));
            $v->last_reply = $v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.tagList')->with('articles', $articles)
            ->with('tags', $tags)->with('tops', ArticleController::getTop10());
    }

}
