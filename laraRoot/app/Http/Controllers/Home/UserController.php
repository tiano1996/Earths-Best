<?php namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show()
    {
//        $post=Post::where('user_id',$id)->get();
//        if($post==null){
//            abort('404');
//        }
//        return view('user.user')->with('post',$post);
        return view('user.user');
    }

    public function setInfo()
    {
        return view('user.settingInfo');
    }

    public function setFace()
    {
        return view('user.settingFace');
    }

    public function setPwd()
    {
        return view('user.settingPwd');
    }
}
