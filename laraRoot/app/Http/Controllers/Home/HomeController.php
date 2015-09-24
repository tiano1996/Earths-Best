<?php namespace App\Http\Controllers\Home;

use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Controller;
use App\Models\Article;

class HomeController extends Controller
{

    /*
     *	首页
     *	with article model
     */
    public function index()
    {
        $articles = Article::with('comment')
            ->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
            ->where('status', config('DbStatus.article.status'))->paginate(10);
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
                ->where('status', config('DbStatus.article.status'))->where('tag', 'like', '%' . $name . '%')->paginate(10);
        else
            $articles = Article::with('comment')->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->where('status', config('DbStatus.article.status'))->paginate(10);
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
        if(!\Cache::has('menu'))
        CacheController::flushMenu();
        return \Cache::get('menu');
    }

    public function cate($cate = null)
    {
        $cateId = \DB::table('article_categories')->select('id')->where('title', $cate)->first();
        if (is_null($cateId)) {
            return $this->tagList();
        }
        if ($cate != null)
            $articles = Article::with('comment')->select(['id', 'title', 'tag', 'view', 'introduction', 'updated_at', 'created_at'])
                ->where('status', config('DbStatus.article.status'))->where('category_id', $cateId->id)->paginate(10);
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
}
