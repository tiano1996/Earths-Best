<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;

class UserController extends Controller
{
    public function show()
    {
        $id=\Auth::user()->id;
        $article=Article::where('user_id',$id)->get();
        return view('user.user')->with('articles',$article);
    }

    public function setInfo()
    {
        return view('user.settingInfo');
    }

    public function setFace()
    {
        return view('user.settingFace');
    }

    public function setPassword()
    {
        return view('user.settingPassword');
    }
}
