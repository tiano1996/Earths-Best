<?php namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Auth, Redirect, Input,Session;
use Carbon\Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::select(['id', 'title', 'user_id', 'category_id','updated_at', 'created_at', 'deleted_at'])->paginate(10);
        foreach ($articles as $v) {
            $v->last_reply = $v->comment->max('created_at');
        }
        return view('admin.article.index')->with('articles', $articles);
    }

    public function show($id)
    {
        Article::whereNull('deleted_at')->findOrFail($id);
        $this->upView($id);
        $article = Article::find($id);
        $article->tag = explode(",", $article->tag);
        $article->last_reply = $article->comment->max('created_at');
        return view('user.article.show')
            ->with('article', $article)->with('tops', ArticleController::getTop10());
    }

    public function create()
    {
        $cate = Category::whereNull('deleted_at')->get();
        return view('admin.article.create')->with('hotTag', \App\Http\Controllers\Home\ArticleController::hotTag())->with('category', $cate);
    }

    public function store()
    {
        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->title = Input::get('title');
        $article->category_id = Input::get('cate');
        $article->tag = str_replace('，', ',', Input::get('tag'));
        $article->content = Input::get('content');
        $article->ip = \Request::getClientIp();
        $article->created_at = Carbon::now();
        $article->updated_at = Carbon::now();
        if ($article->save()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Article store success!']);
            return Redirect::to(route('admin.article.index'));
        } else {
            Session::flash('notify', ['status' => 'error', 'msg' => 'Article store fail!']);
            return Redirect::back()->withInput()->withErrors('发布失败！');
        }
    }

    public function edit($id)
    {
        $art = Article::findOrFail($id);
        $cate = Category::whereNull('deleted_at')->get();
        return view('admin.article.edit')->with('article', $art)->with('hotTag', \App\Http\Controllers\Home\ArticleController::hotTag())->with('category', $cate);
    }

    public function update($id)
    {
        $article = Article::find($id);
        $article->user_id_edited = \Auth::user()->id;
        $article->title = Input::get('title');
        $article->category_id = Input::get('cate');
        $article->tag = str_replace('，', ',', Input::get('tag'));
        $article->content = Input::get('content');
        $article->ip = \Request::getClientIp();
        $article->updated_at = Carbon::now();
        if ($article->save()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Article update success!']);
            return Redirect::to(route('admin.article.index'));
        } else {
            Session::flash('notify', ['status' => 'error', 'msg' => 'Article update fail!']);
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->deleted_at=Carbon::now();
        if ($article->save()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Article delete success!']);
            return Redirect::to(route('admin.article.index'));
        } else {
            Session::flash('notify', ['status' => 'error', 'msg' => 'Article delete fail!']);
            return Redirect::back();
        }
    }

}
