<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;

class HomeController extends Controller
{

    /*
     *	首页
     *	with hot
     */
    public function index()
    {
        $articles = Article::where('status', '0')->get();
        $list=array();
        foreach ($articles as $v) {
            $list=array_merge($list,explode(',', $v->slug));
        }
        $tag = array_unique($list);
        return view('home.index')->with('articles', $articles)->with('tags', $tag);
    }

}
