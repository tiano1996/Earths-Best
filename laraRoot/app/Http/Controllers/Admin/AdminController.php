<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Auth;
use Redirect;
class AdminController extends Controller {

	public function index()
	{
        if(Auth::User()->admin=='1'){
            return view('admin.index');
        }else{
            \Log::warning('Notice,User guest try to visit admins:'. Auth::User()->username);
            return Redirect::to('/');
        }
	}

}
