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
        $articles = Article::with('comment')->select(['id','title','slug','view','introduction','updated_at'])
            ->where('status',config('DbStatus.article.status'))->get();
        $list=array();
        foreach ($articles as $v) {
            $list=array_merge($list,explode(',', $v->slug));
            $v->last_reply=$v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.index')->with('articles', $articles)->with('tags', $tags);
    }

}
