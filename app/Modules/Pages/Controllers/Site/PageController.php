<?php


namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Page;

class PageController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function view($slug)
    {
        $page = Page::where('slug', $slug)->first();



        switch ($slug) {
            case 'katalog':
                return view('Pages::site.pages.catalog', compact('page'));
            case 'kontakty':
                $cities = City::with('shops')->get();
                $contacts = Contact::where('id', 1)->first();
                return view('Pages::site.pages.contacts', compact('page', 'cities', 'contacts'));
            case 'uslugi':
                return view('Pages::site.pages.services', compact('page'));
            default:
                return view('Pages::site.pages.view', compact('page'));
        }
    }
}
