<?php namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth, Input, Redirect, Mail;

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
        $check = \DB::table('users')->where('username', $username)->where('confirmed', '1')->first();
        if (!$check) {
            return Redirect::to('auth/login')
                ->withErrors('sorry,帐号未激活!!!')
                ->withInput();
        }
        $this->validator(array('username' => $username, 'password' => $password));
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            return Redirect::intended();
        } else {
            return Redirect::back()
                ->withErrors('用户名或密码不正确!!')
                ->withInput();
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:30',
            'password' => 'required|min:6',
        ]);
    }

    protected function create(array $data)
    {
        $data['token'] = str_random(32);
        Mail::send('emails.confirm', ['token' => $data['token'], 'email' => $data['email']], function ($message) {
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
