<?php namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Auth, Redirect, Input,Session;
use Carbon\Carbon;

class CateController extends Controller
{

    public function index()
    {
        return view('admin.cate.index');
    }

    public function show($id)
    {
        return view('user.article.show');
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store()
    {
        if (true) {
            return Redirect::to(route('admin.cate.index'));
        } else {
            return Redirect::back()->withInput()->withErrors('修改失败！');
        }
    }

    public function edit($id)
    {
        return view('admin.article.edit');
    }

    public function update($id)
    {
        if (true) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Cate update success!']);
            return Redirect::to(route('admin.article.index'));
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

    public function destroy($id)
    {
        if (true) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Cate delete success!']);
            return Redirect::to(route('admin.cate.index'));
        } else {
            return Redirect::back()->withInput()->withErrors('更新失败！');
        }
    }

}
