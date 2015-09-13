<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;

class UserController extends Controller
{
    public function index()
    {
        $user_id = \Auth::user()->id;
        $articles = Article::with('comment')
            ->select(['id', 'title', 'slug', 'view', 'introduction', 'updated_at', 'created_at'])
            ->where('user_id', $user_id)->where('status', config('DbStatus.article.status'))->paginate(1);
        foreach ($articles as $v) {
            $v->slug = str_replace('，', ',', $v->slug);
            $v->last_reply = $v->comment->max('created_at');
        }
        return view('user.user')
            ->with('articles', $articles)->with('tops', ArticleController::getTop10());
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
