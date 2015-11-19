<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Input, Validator, Redirect, Auth, Hash;

class UserController extends Controller
{
    public function index()
    {
        $user_id = \Auth::user()->id;
        $articles = Article::with('comment')
            ->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
            ->where('user_id', $user_id)->where('status', config('DbStatus.article.status'))->paginate(1);
        foreach ($articles as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
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

    public function postPassword()
    {
        $pwdOld = Input::get('pwdOld');
        $pwdNew = Input::get('pwdNew');
        $pwdRe = Input::get('pwdRe');
        $v = Validator::make([
            'pass_old' => $pwdOld,
            'password' => $pwdNew,
            'password_confirmation' => $pwdRe,
        ],
            [
                'pass_old' => 'required|min:6',
                'password' => 'required|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
            ]);
        if ($v->fails()) {
            Redirect::back()->withErrors($v->errors());
        } else {
            if (!Hash::check($pwdOld, Auth::getUser()->getAuthPassword())) {
                return Redirect::back()->with('msg', '原密码错误！');
            } else {
                $user = Auth::getUser();
                $user->password = Hash::make($pwdNew);
                if ($user->save()) {
                    return Redirect::back()->with('info', '密码修改成功！');
                } else {
                    return Redirect::back()->with('info', '密码修改失败！');
                }
            }
        }
    }

    public function confirm($url)
    {
        $data = \DB::table('users')
            ->whereNull('deleted_at')
            ->where('confirmation_code', $url)
            ->update(['confirmation_code' => null, 'confirmed' => '1']);
        if ($data) {
            return view('auth.notice')->with('msg', '激活成功，欢迎访问Earth Best！');
        }
        return view('auth.notice')->with('msg', 'So sad, 发生错误，请联系管理员！');
    }
}
