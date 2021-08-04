<?php

namespace App\Http\Controllers;


use App\Models\MainPage;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $r)
    {


        $posts = Project::orderBy('id','desc')->get();
        $pages = Page::orderBy('id','desc')->get();
        $main_page = MainPage::onWriteConnection()->find(1);
        return response()->view('sitemap', compact('posts', 'pages', 'main_page'))
            ->header('Content-Type', 'text/xml');

    }
}
