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
        return view('admin.cate.index')->with('tree', $res->getTree());
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
            Session::flash('notify', ['status' => 'success', 'msg' => 'Cate store success!']);
            return Redirect::to(route('admin.cate.index'));
        } else {
            Session::flash('notify', ['status' => 'fail', 'msg' => 'Cate store faile!']);
            return Redirect::back()->withInput();
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
            return Redirect::to(route('admin.cate.index'));
        } else {
            return Redirect::back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (true) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'Cate delete success!']);
            return Redirect::to(route('admin.cate.index'));
        } else {
            Session::flash('notify', ['status' => 'fail', 'msg' => 'Cate delete fail!']);
            return Redirect::back()->withInput();
        }
    }

}
