<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{

    public function getIndexStart()
    {
        return view('admin.indexPage');
    }

    public function getSkinConfig()
    {
        return view('admin.skin');
    }

}
