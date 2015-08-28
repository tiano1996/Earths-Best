<?php namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
class LimitController extends Controller {

    public function noRegister()
    {
        return view('errors.noRegister');
    }
}