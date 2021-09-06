<?php


namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Category;
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

            $product_size_first = ProductOption::where('product_id', $product->id)
                ->get();

            $product_sizes = collect();
            foreach ($product_size_first as $size){
                if($product_sizes->where('size_id', $size->size_id)->count() < 1){
                    $product_sizes->push($size);
                }
            }
            $product_sizes = $product_sizes->map(function($item){
                $item->size = $item->sizes()->first()->size;
                return $item;
            })->sortBy('size');

            $product_colors_first = ProductOption::where([
                'product_id'=> $product->id,
                'size_id' => $product_sizes->first()->size_id
            ])->get();

            $category = Category::where('id', $product->category_id)->first();
            if($category->parent_id == null) {
                $breadcrumbs = (object) [
                    'current' => $product->translate()->title,
                    'parent' =>  [$category]
                ];
            } else {
                $breadcrumbs = (object) [
                    'current' => $product,
                    'parent' =>[
                        Category::where('id', $category->parent_id)->first(),
                        $category
                        ]
                ];
            }

            return view('Pages::site.pages.product', compact('product', 'product_colors_first', 'product_sizes', 'breadcrumbs'));
        }

        $breadcrumbs = (object) [
            'current' => $page->translate()->title,
            'parent' => null
        ];
        switch ($slug) {
            case 'katalog':
                return view('Pages::site.pages.catalog', compact('page', 'breadcrumbs'));
            case 'kontakty':
                $cities = City::with('shops')->get();
                $contacts = Contact::where('id', 1)->first();

                return view('Pages::site.pages.contacts', compact('page', 'cities', 'contacts', 'breadcrumbs'));
            case 'uslugi':
                return view('Pages::site.pages.services', compact('page', 'breadcrumbs'));
            default:
                if($page->parent_id !== 0){
                    $breadcrumbs = (object) [
                        'current' => $page->translate()->title,
                        'parent' => Page::where('id', $page->parent_id)->get()
                    ];
                }
                return view('Pages::site.pages.view', compact('page', 'breadcrumbs'));
        }
    }

    public function selectColor(Request $request, $id)
    {

        $options = ProductOption::where([
            'product_id' =>$id,
            'size_id'=>$request->id
        ])->get();
        if($request->ajax()){
            return view('ajax-tpl.select-color', compact('options'))->render();
        }
    }
}
