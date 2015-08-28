<?php namespace App\Http\Controllers\Home;
use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function show($id)
    {
        $post=Post::find($id);
//        if($post==null){
//            abort('404');
//        }
        return view('post.post')->with('post',$post);
    }
    public function create(){
        return view('post.createPost');
    }

}
