<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainPage;

class HomeController extends BaseController
{
    public function index()
    {
        $page = MainPage::first();

        return view('admin.home.index', compact('page'));
    }

}
