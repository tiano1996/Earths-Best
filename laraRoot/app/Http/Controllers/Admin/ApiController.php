<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'getLogout']);
    }

    public function getIndexStart()
    {
        return view('admin.indexPage');
    }

    public function getSkinConfig()
    {
        return view('admin.skin');
    }

}
