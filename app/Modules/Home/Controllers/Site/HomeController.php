<?php


namespace App\Modules\Home\Controllers\Site;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home::site.home.index');
    }
}