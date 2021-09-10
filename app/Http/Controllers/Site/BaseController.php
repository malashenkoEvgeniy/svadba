<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    public function __construct(){

        $h_contacts = Contact::where('id', 1)->first();
        $h_pages = Page::where('parent_id', 0)->with('children')->get();
        $h_categories = Category::where('parent_id', 0)->with('children')->get();
        $test = Product::where('is_promotion', 1)->get();

        view()->share(compact('h_contacts', 'h_pages', 'h_categories', 'test'));
    }

}
