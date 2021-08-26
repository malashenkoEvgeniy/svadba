<?php


namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\City;
use App\Models\ClothingSize;
use App\Models\Colors;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Product;
use App\Models\Silhouette;
use App\Models\Textile;
use App\Services\ProductService;
use Illuminate\Http\Request;

class PageController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function view($slug)
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
            case 'akcii':
                    $products = Product::where('is_promotion', 1)->paginate(12);

                $brands = Brand::whereIn('id', ProductService::getArrayItems($products, 'brand'))->get();
                $colors = Colors::whereIn('id', ProductService::getArrayItemsOptions($products))->get();
                $silhouettes = Silhouette::whereIn('id', ProductService::getArrayItems($products, 'silhouette'))->get();
                $textiles = Textile::whereIn('id', ProductService::getArrayItems($products, 'textile'))->get();
                $sizes = ClothingSize::whereIn('id', ProductService::getArrayItemsOptions($products, 'size_id'))->get();
                return view('Pages::site.pages.promotion', compact('page',
                                                                        'products',
                                                                                    'brands',
                                                                                    'colors',
                                                                                    'silhouettes',
                                                                                    'textiles',
                                                                                    'sizes',

                ));
            default:
                return view('Pages::site.pages.view', compact('page'));
        }
    }

    public function promSort(Request $request)
    {
//        return response()->json(['orderBy'=> $request->orderBy], 200);
        if($request->orderBy == 'sort-price-asc') {
            $products = Product::where([
                'is_promotion'=>1])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'asc')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-price-desc') {
            $products = Product::where([ 'is_promotion'=>1])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'desc')
                ->paginate(12);
        }
        if($request->ajax()){

            return view('ajax-tpl.sort', compact('products'))->render();
        }
    }
}
