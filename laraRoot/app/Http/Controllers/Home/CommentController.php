<?php namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Redirect, Input;
use App\Models\Comment;

class CommentController extends Controller {

	public function store()
	{
        $comment = new Comment;
        $comment->author_nickname = Input::get('nickname');
        $comment->author_email=Input::get('email');
        $comment->author_ip=\Request::getClientIp();
        $comment->text = Input::get('content');
        $comment->article_id=Input::get('article_id');
        $comment->parent_id=Input::get('p_id');
        $comment->created_at=Carbon::now();
		if ($comment->save()) {
			return Redirect::back();
		} else {
			return Redirect::back()->withInput()->withErrors('评论发表失败！');
		}
	}

}
