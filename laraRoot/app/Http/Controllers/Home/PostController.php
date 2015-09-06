<?php namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function show($id)
    {
        $post = Post::findOrFail($id);
//        if($post==null){
//            abort('404');
//        }
        return view('post.post')->with('post', $post);
    }

    public function getCreate()
    {
        return view('post.createPost');
    }

    public function postCreate()
    {
        return;
    }

}
