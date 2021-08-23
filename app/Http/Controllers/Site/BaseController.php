<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct(){
        $h_contacts = Contact::where('id', 1)->first();
        $h_pages = Page::where('parent_id', 0)->with('children')->get();
        $h_categories = Category::where('parent_id', 0)->with('children')->get();
        $test = Product::where('is_promotion', 1)->get();
        view()->share(compact('h_contacts', 'h_pages', 'h_categories', 'test'));
    }
//    function __construct(){
//        $settings = Settings::find(1);
//        $categories = Category::where('parent_id', null)->with('children')->get();
//        $pages = Page::where('parent_id', null)->with('getKids')->orderby('order_by')->get();
//        $interesting = Page::where('parent_id', 1)->get();
//        $certificates = Certificates::get();
//        view()->share(compact('settings','certificates', 'categories','interesting', 'pages'));
//    }
}
