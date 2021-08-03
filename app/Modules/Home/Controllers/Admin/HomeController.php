<?php


namespace App\Modules\Home\Controllers\Admin;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        return view('Home::admin.home.index');
    }
}
