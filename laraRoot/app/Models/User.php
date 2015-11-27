<?php namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    /*
     * User model
     */
    use Authenticatable, CanResetPassword;
    protected $table = 'users';
    protected $timestamp=true;
    protected $fillable = ['username', 'email', 'password','confirmation_code'];
    protected $hidden = ['password', 'remember_token'];
    protected $guarded = ['id','admin'];

    public function article(){
        return $this->hasMany('App\Models\Article');
    }
}
