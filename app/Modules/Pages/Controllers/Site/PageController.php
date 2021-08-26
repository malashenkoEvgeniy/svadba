<?php


namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\City;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductOption;
use App\Services\NewPostServices;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function view(Request $request, $slug)
    {

        $page = Page::where('slug', $slug)->first();
        if ($page == null){
            $product = Product::where('slug', $slug)
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->first();
            if ($product == null){
                dd(4);
                abort('404');
            }
//            $product = ProductOption::where('product_id', 1)->first();
//            dd($product->product->translate()->title);
//            NewPostServices::areas();
//            $request->session()->put('korzina.product.id', 325);
//            $res = $request->session()->all();
//            dd($res);
            return view('Pages::site.pages.product', compact('product'));
        }

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
