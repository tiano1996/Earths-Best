<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    public $redirectPath = '/user';
    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\PasswordBroker $passwords
     */
    public function __construct(Guard $auth, PasswordBroker $passwords)
    {
        $this->auth = $auth;
        $this->passwords = $passwords;

        $this->middleware('guest');
    }

    /**
     * 密码重置
     * 重写密码重置。
     * 1.检查令牌是否存在
     * 2.检查令牌是否失效
     * @param  string $token
     * @return \Illuminate\Http\Response
     */
    public function getReset($token = null)
    {
        $_checkToken = \DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHour(1))
            ->where('created_at', '<', Carbon::now())
            ->first();
        if (is_null($token)) {
            return view('errors.503')->with('error', 'Sorry，令牌无效。');
        }
        if (!$_checkToken) {
            return view('errors.503')->with('error', 'Sorry，令牌已失效，请重新申请。');
        }
        return view('auth.reset')->with('token', $token)->with('data', $_checkToken);
    }
}
