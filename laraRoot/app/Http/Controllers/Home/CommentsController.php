<?php namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Redirect, Input;
use App\Models\Comment;

class CommentsController extends Controller {

	public function store()
	{
        $comment = new Comment;
        $comment->nickname = Input::get('nickname');
        $comment->email=Input::get('email');
        $comment->title = Input::get('title');
        $comment->content = Input::get('content');
        $comment->event_id=Input::get('eventid');
		if ($comment->save()) {
			return Redirect::back();
		} else {
			return Redirect::back()->withInput()->withErrors('评论发表失败！');
		}
	}

}
