<?php namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Cache;
class CacheController extends Controller {

    public function index()
    {
    }

    public static function flushMenu(){
        $menuP = \DB::table('article_categories')->where("pid", 0)->whereNull('deleted_at')->get();
        foreach ($menuP as &$v) {
            $menuS = \DB::table('article_categories')->where("pid", $v->id)->whereNull('deleted_at')->get();
            if (count($menuS)) {
                foreach ($menuS as $sv) {
                    $v->menu[] = $sv;
                }
            }
        }
        Cache::forever('menu',$menuP);
        return 'Menu flash success!';
    }

}