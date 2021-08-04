<?php

namespace App\Http\Controllers\Admin;

class HomeController extends BaseController
{
    public function index()
    {
        $page = MainPage::first();

        return view('admin.main_page.edit', compact('page'));
    }

}
