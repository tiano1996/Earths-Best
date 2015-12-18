<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Input;
use Redirect;
use Session;

class UserController extends Controller
{

    public function index()
    {
        $articles = User::select(['id', 'username', 'email', 'admin', 'confirmed', 'created_at'])
            ->whereNull('deleted_at')->paginate(10);
        return view('admin.user.index')
            ->with('users', $articles);
    }

    public function show($id)
    {
        return view('user.show');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store()
    {
        $user = new User();
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('password'));
        $user->email = Input::get('email');
        $user->confirmed = (Input::get('confirmed')) ? 1 : 0;
        $user->admin = Input::get('admin') ? 1 : 0;
        if ($user->save()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'User store success!']);
            return Redirect::to(route('admin.user.index'));
        } else {
            Session::flash('notify', ['status' => 'warning', 'msg' => 'User store fail!']);
            return Redirect::back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->username = Input::get('username');
        $user->password = (substr(Input::get('password'),0,7)=='$2y$10$')?:bcrypt(Input::get('password'));
        $user->email = Input::get('email');
        $user->confirmed = (Input::get('confirmed')) ? 1 : 0;
        $user->admin = Input::get('admin') ? 1 : 0;
        if ($user->update()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'User update success!']);
            return Redirect::to(route('admin.user.index'));
        } else {
            Session::flash('notify', ['status' => 'warning', 'msg' => 'User update fail!']);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->delete()) {
            Session::flash('notify', ['status' => 'success', 'msg' => 'User delete success!']);
            return Redirect::to(route('admin.user.index'));
        } else {
            Session::flash('notify', ['status' => 'warning', 'msg' => 'User delete fail!']);
            return Redirect::back()->withInput();
        }
    }

}
