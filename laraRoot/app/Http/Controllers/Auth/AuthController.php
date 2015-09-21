<?php namespace App\Http\Controllers\Auth;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth, Input, Redirect;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;
    public $redirectPath = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    // 登录操作
    public function postLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        \Validator::make(
            array('username' => $username, 'password' => $password),
            ['username' => 'required|max:255',
//          'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6']);
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            return Redirect::to('/');
        } else {
            return Redirect::to('auth/login')
                ->withErrors('用户名或密码不正确!!!')
                ->withInput();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
