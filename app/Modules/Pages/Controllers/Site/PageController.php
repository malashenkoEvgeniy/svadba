<?php


namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\Page;

class PageController extends BaseController
{
    public function view($slug)
    {

        $page = Page::where('slug', $slug)->first();
        return view('Pages::site.pages.view', compact('page'));
    }
}
