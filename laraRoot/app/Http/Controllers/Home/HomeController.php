<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Cache;
use DB;
use Request;

class HomeController extends Controller
{

    /*
     *	首页
     *	with article model
     */
    public function index($parm = null)
    {
        if ($parm != null) {
            $articles = Article::with('comment')
                ->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->whereNull('deleted_at')
                ->orderBy($parm, 'desc')
                ->paginate(2);
        } else {
            $articles = Article::with('comment')
                ->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->whereNull('deleted_at')
                ->paginate(2);
        }
        $list = array();
        foreach ($articles as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
            $list = array_merge($list, explode(',', $v->tag));
            $v->last_reply = $v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.index')
            ->with('articles', $articles)->with('tags', $tags)->with('tops', ArticleController::getTop10());
    }

    public function tagList($name = null)
    {
        if ($name != null)
            $articles = Article::with('comment')->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->whereNull('deleted_at')->where('tag', 'like', '%' . $name . '%')->paginate(10);
        else
            $articles = Article::with('comment')->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->whereNull('deleted_at')->paginate(10);
        $list = array();
        foreach ($articles as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
            $list = array_merge($list, explode(',', $v->tag));
            $v->last_reply = $v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.tagList')
            ->with('articles', $articles)->with('tags', $tags)->with('tops', ArticleController::getTop10());
    }

    public static function menu()
    {
        if (!Cache::has('menu')) {
            $menuP = \DB::table('article_categories')->where("pid", 0)->whereNull('deleted_at')->get();
            foreach ($menuP as &$v) {
                $menuS = \DB::table('article_categories')->where("pid", $v->id)->whereNull('deleted_at')->get();
                if (count($menuS)) {
                    foreach ($menuS as $sv) {
                        $v->menu[] = $sv;
                    }
                }
            }
            Cache::forever('menu', $menuP);
        }
        return Cache::get('menu');
    }

    public function cate($cate = null)
    {
        $cateId = DB::table('article_categories')->select('id')->where('title', $cate)->first();
        if (is_null($cateId)) {
            return $this->tagList();
        }
        if ($cate != null)
            $articles = Article::with('comment')->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->whereNull('deleted_at')->where('category_id', $cateId->id)->paginate(10);
        else
            return $this->tagList();
        $list = array();
        foreach ($articles as $v) {
            $v->tag = str_replace('，', ',', $v->tag);
            $list = array_merge($list, explode(',', $v->tag));
            $v->last_reply = $v->comment->max('created_at');
        }
        $tags = array_unique($list);
        return view('home.cateList')
            ->with('articles', $articles)->with('tags', $tags)->with('tops', ArticleController::getTop10());
    }

    public function order()
    {
        if (Request::is('latest')) {
            return $this->index('created_at');
//            dd('latest');
        } elseif (Request::is('hot')) {
            return $this->index('view');
//            dd('hot');
        } elseif (Request::is('update')) {
            return $this->index('updated_at');
//            dd('update');
        } else {
            return $this->index();
        }
    }
}
