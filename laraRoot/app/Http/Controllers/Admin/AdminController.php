<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Input;
use Redirect;
use Session;
use Cache;
use DB;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::User()->admin == '1') {
            return view('admin.index');
        } else {
            \Log::warning('Notice,User guest try to visit admins:' . Auth::User()->username);
            return Redirect::to('/');
        }
    }

    public function config()
    {
        $config['APP_ENV'] = env('APP_ENV');
        $config['APP_DEBUG'] = env('APP_DEBUG');
        $config['APP_KEY'] = env('APP_KEY');
        $config['APP_URL'] = env('APP_URL');
        $config['LOG_DRIVER'] = env('LOG_DRIVER');
        $config['MAIL_HOST'] = env('MAIL_HOST');
        $config['MAIL_USERNAME'] = env('MAIL_USERNAME');
        $config['MAIL_PASSWORD'] = env('MAIL_PASSWORD');
        return view('admin.config', compact('config'));
    }

    public function postConfig()
    {
        $config['APP_DEBUG'] = (Input::get('debug') == 'open') ? true : false;
        $config['APP_KEY'] = Input::get('key');
        $config['APP_URL'] = Input::get('url');
        $config['LOG_DRIVER'] = Input::get('log');
        $config['MAIL_HOST'] = Input::get('host');
        $config['MAIL_USERNAME'] = Input::get('username');
        $config['MAIL_PASSWORD'] = Input::get('password');
        if ($this->modifyEnv($config)) {
            Session::flash('notify', ['status' => 'success', 'msg' => '保存成功']);
            return redirect()->back();
        } else {
            Session::flash('notify', ['status' => 'warning', 'msg' => '保存失败']);
            return redirect()->back()->withInput()->withErrors('保存失败!');
        }
    }

    public function optimize()
    {
        return view('admin.optimize');
    }

    public function postClearSession()
    {
        Session::flush();
        Session::flash('notify', ['status' => 'success', 'msg' => 'Session 清理成功！']);
        return redirect()->back();
    }

    public function postClearCache()
    {
        Cache::flush();
        Session::flash('notify', ['status' => 'success', 'msg' => 'Cache 清理成功！']);
        return redirect()->back();
    }

    public function postFlashMenu(){
        $menuP = DB::table('article_categories')->where("pid", 0)->whereNull('deleted_at')->get();
        foreach ($menuP as &$v) {
            $menuS = DB::table('article_categories')->where("pid", $v->id)->whereNull('deleted_at')->get();
            if (count($menuS)) {
                foreach ($menuS as $sv) {
                    $v->menu[] = $sv;
                }
            }
        }
        Cache::forever('menu',$menuP);
        Session::flash('notify', ['status' => 'success', 'msg' => 'Menu flash success!']);
        return redirect()->back();
    }

    public function postOptimizeDatabase(){
        $res=DB::statement("OPTIMIZE TABLE `articles`, `article_categories`, `comments`, `password_resets`, `photos`, `photo_albums`, `users`");
        if($res)
        Session::flash('notify', ['status' => 'success', 'msg' => 'Database optimize Success!']);
        return redirect()->back();
    }

    public function cateList()
    {
        return view('admin.cate.list');
    }

    public function cateAdd()
    {
        return view('admin.cate.add');
    }

    public function cateDel()
    {
        return view('admin.cate.del');
    }

    function modifyEnv(array $data)
    {
        $envPath = base_path() . DIRECTORY_SEPARATOR . '.env';
        $contentArray = collect(file($envPath, FILE_IGNORE_NEW_LINES));
        $contentArray->transform(function ($item) use ($data) {
            foreach ($data as $key => $value) {
                if (str_contains($item, $key)) {
                    return $key . '=' . $value;
                }
            }
            return $item;
        });
        $content = implode($contentArray->toArray(), "\n");
        try {
            \File::put($envPath, $content);
            return true;
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(array('errors' => $e->getMessage()));
        }
    }

}
