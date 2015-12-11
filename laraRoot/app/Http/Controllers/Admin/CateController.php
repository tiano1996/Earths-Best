<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Popohum\UnlimitedTree\Tree;
use Redirect;
use Session;
use \App\Models\Category;

class CateController extends Controller
{

    public function index()
    {
        $data = Category::whereNull('deleted_at')->get()->toArray();
        $res = new Tree($data);
        return view('admin.cate.index')->with('foo', $res->getTree());
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
