<?php namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Cache, Redirect,Input;
use Carbon\Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::with('comment')
            ->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
            ->where('status', config('DbStatus.article.status'))->paginate(1);
        foreach ($articles as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
            $v->last_reply = $v->comment->max('created_at');
        }
        return view('user.article.index')
            ->with('articles', $articles)->with('tops', ArticleController::getTop10());
    }

    public function show($id)
    {
        Article::where('status', config('DbStatus.article.status'))->findOrFail($id);
        $this->upView($id);
        $article = Article::find($id);
        $article->tag = explode(",", str_replace('，', ',', $article->tag));
        $article->last_reply = $article->comment->max('created_at');
        return view('user.article.show')
            ->with('article', $article)->with('tops', ArticleController::getTop10());
    }

    public function create()
    {
        $cate = Category::whereNull('deleted_at')->get();
        return view('user.article.create')->with('hotTag', $this->hotTag())->with('category', $cate);
    }

    public function store()
    {
        $article = new Article();
        $article->user_id = \Auth::user()->id;
        $article->title = Input::get('title');
        $article->category_id = Input::get('cate');
        $article->tag = Input::get('tag');
        $article->content = Input::get('content');
        $article->ip = \Request::getClientIp();
        $article->created_at=Carbon::now();
        $article->updated_at=Carbon::now();
        if ($article->save()) {
            return Redirect::to('/article/'.$article->id);
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id)
    {
        $art=Article::findOrFail($id);
        $cate = Category::where('status', config('DbStatus.category.status'))->get();
        return view('user.article.edit')->with('article',$art)->with('hotTag', $this->hotTag())->with('category', $cate);
    }

    public function update($id)
    {
        $article = Article::find($id);
        $article->user_id_edited = \Auth::user()->id;
        $article->title = Input::get('title');
        $article->category_id = Input::get('cate');
        $article->tag = Input::get('tag');
        $article->content = Input::get('content');
        $article->ip = \Request::getClientIp();
        $article->updated_at=Carbon::now();
        if ($article->save()) {
            return Redirect::to('/article/'.$article->id);
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        $article=Article::findOrFail($id);
        if ($article->delete()) {
            return Redirect::to('/user/article');
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function upView($id)
    {
        $ip = \Request::getClientIp();
        $viewName = 'view_' . $id . '_' . ip2long($ip);
        if (!Cache::has($viewName)) {
            $art = Article::find($id);
            $art->view++;
            $art->save();
            Cache::add($viewName, true, config('DbStatus.article.time'));
        }
    }

    public static function getTop10()
    {
        $art = Article::select(['id', 'title'])->where('status', config('DbStatus.article.status'))
            ->orderBy('view', 'desc')->take(10)->get();
        return $art;
    }

    public static function hotTag()
    {
        $tag = Article::select(['id', 'tag'])->where('status', config('DbStatus.article.status'))
            ->orderBy('view', 'desc')->take(10)->get();
        $data = array();
        foreach ($tag as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
            $data = array_merge($data, explode(',', $v->tag));
        }
        $data = array_unique($data);
        return $data;
    }

}
