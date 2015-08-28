<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Redirect, Input, Auth;

class PostController extends Controller
{

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
        $post = new Post;
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->user_id = Auth::user()->id;

        if ($post->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id)
    {
        return view('admin.posts.edit')->withPost(Post::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title,' . $id . '|max:255',
            'body' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = Input::get('title');
        $post->body = Input::get('body');
        $post->user_id = Auth::user()->id;

        if ($post->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return Redirect::to('admin');
    }

}
