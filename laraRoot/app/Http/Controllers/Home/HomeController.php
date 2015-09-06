<?php namespace App\Http\Controllers\Home;
use App\Models\Article;
use App\Http\Controllers\Controller;
class HomeController extends Controller {

	/*
	 *	首页
	 *	with hot
	 */
	public function index()
	{
        $article = Article::where('status','0')->get();
        return view('home.index')->with('articles',$article);
	}

}
