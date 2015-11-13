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
        $this->validator( array('username' => $username, 'password' => $password));
//        \Validator::make(
//            array('username' => $username, 'password' => $password),
//            ['username' => 'required|max:255',
////          'email' => 'required|email|max:255|unique:users',
//                'password' => 'required|confirmed|min:6']);
        if (Auth::attempt(array('username' => $username, 'password' => $password,'confirmed' => 1))) {
            return Redirect::to('/');
        } else {
            return Redirect::to('auth/login')
                ->withErrors('密码不正确或帐号未激活!!!')
                ->withInput();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'email' => 'required|email|max:30|unique:users',
            'username' => 'required|max:30',
            'password' => 'required|min:6',
        ]);
    }

    protected function create(array $data)
    {
        $data['token'] = str_random(32);
        \Mail::send('emails.confirm', $data, function ($message) {
            $message->to(Input::get('email'))->subject('Welcome to the Earth Best,Confirm Link!');
        });
        return User::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $data['token'],
        ]);
    }
}
