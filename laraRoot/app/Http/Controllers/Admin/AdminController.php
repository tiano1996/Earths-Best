<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use Redirect;
class AdminController extends Controller {

	public function index()
	{
        if(Auth::User()->role=='adminer'){
            return view('admin.AdminHome')->withPosts(Post::all());
        }else{
            \Log::info('Notice,guest try to admins:'.Auth::User()->name);
            return Redirect::to('/');
        }
	}

}
