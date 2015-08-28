<?php namespace App\Http\Controllers\Home;
use App\Models\Post;
use App\Http\Controllers\Controller;
class HomeController extends Controller {

	/*
	 *	首页
	 *	with hot
	 */
	public function index()
	{
        $event = Post::all();
        return view('home.index')->with('posts',$event);
	}

}
