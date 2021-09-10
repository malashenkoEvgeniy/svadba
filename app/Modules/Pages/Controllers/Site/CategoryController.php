<?php

namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ClothingSize;
use App\Models\Colors;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\Silhouette;
use App\Models\Textile;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function viewSort(Request $request, $slug)
    {
        $rubric = Category::where('slug', $slug)->with('children')->first();
        if($request->orderBy == 'sort-promotion') {
            $products = Product::where(
                ['category_id'=> $rubric->id,
                    'available'=>1
            ])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('is_promotion', 'desc')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-new') {
            $products = Product::where(
                ['category_id'=> $rubric->id,
                    'available'=>1
                ])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('is_new', 'desc')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-price-asc') {
            $products = Product::where(
                ['category_id'=> $rubric->id,
                    'available'=>1
                ])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'asc')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-price-desc') {
            $products = Product::where(
                ['category_id'=> $rubric->id,
                    'available'=>1
                ])
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'desc')
                ->paginate(12);
        }
        if($request->ajax()){
            return view('ajax-tpl.sort', compact('products'))->render();
        }
    }

//    public function view(Request $request, $slug, Product $product)
//    {
//        $rubric = Category::where('slug', $slug)->with('children')->first();
//
//        $products = Product::where('category_id', $rubric->id)
//            ->with('brand', 'silhouette', 'color', 'size', 'textile')
//            ->paginate(12);
//
//        $brands = Brand::whereIn('id', ProductService::getArrayItems($products, 'brand'))->get();
//        $categories = Category::whereIn('id', ProductService::getArrayItems($products, 'category'))->get();
//        $colors = Colors::whereIn('id', ProductService::getArrayItemsOptions($products))->get();
//        $silhouettes = Silhouette::whereIn('id', ProductService::getArrayItems($products, 'silhouette'))->get();
//        $textiles = Textile::whereIn('id', ProductService::getArrayItems($products, 'textile'))->get();
//        $sizes = ClothingSize::whereIn('id', ProductService::getArrayItemsOptions($products, 'size_id'))->get();
//
//        $breadcrumbs = (object) [
//            'current' => strip_tags($rubric->translate()->title),
//            'parent' => Page::where('slug', 'katalog')->get()
//        ];
//
//          return view('Pages::site.categories.view', compact(
//              'categories',
//              'brands',
//              'colors',
//              'silhouettes',
//              'textiles',
//              'sizes',
//              'rubric',
//              'products',
//              'breadcrumbs'
//          ));
//    }

    public function view(Request $request, $slug, Product $product)
    {
        $rubric = Category::where('slug', $slug)->with('children')->first();

        $products = $product->getProductsBySearch($request)
            ->where([
                'category_id'=> $rubric->id,
                'available'=>1
                ])
            ->with('brand', 'silhouette', 'color', 'size', 'textile');
//        ->get()
//            ->paginate(12);
//        dd($products);

        $brands = Brand::whereIn('id', ProductService::getArrayItems($products->get(), 'brand'))->get();
        $categories = Category::whereIn('id', ProductService::getArrayItems($products->get(), 'category'))->get();
        $colors = Colors::whereIn('id', ProductService::getArrayItemsOptions($products->get()))->get();
        $silhouettes = Silhouette::whereIn('id', ProductService::getArrayItems($products->get(), 'silhouette'))->get();
        $textiles = Textile::whereIn('id', ProductService::getArrayItems($products->get(), 'textile'))->get();
        $sizes = ClothingSize::whereIn('id', ProductService::getArrayItemsOptions($products->get(), 'size_id'))->get();

        $breadcrumbs = (object) [
            'current' => strip_tags($rubric->translate()->title),
            'parent' => Page::where('slug', 'katalog')->get()
        ];

        return view('Pages::site.categories.view', [
            'categories' =>$categories,
            'brands' =>$brands,
            'colors' =>$colors,
            'silhouettes' =>$silhouettes,
            'textiles' => $textiles,
            'sizes' => $sizes,
            'rubric' => $rubric,
            'products' => $products->paginate(12),
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function viewFilter(Request $request, $slug, Product $product)
    {
        $rubric = Category::where('slug', $slug)->with('children')->first();
        $str = '1=1 ';
        if ($request->pricemin !== null) {
            $str .=  ' and price >= '.$request->pricemin;
        }
        if ($request->pricemax !== null) {
            $str .=  ' and price < '.$request->pricemax;
        }
        if ($request->brands !== null) {
            $str .=  ' and brand_id IN('.implode(',',$request->brands).') ';
        }
        if ($request->silhouettes !== null) {
            $str .=  ' and silhouette_id IN('.implode(',',$request->silhouettes).') ';
        }

        if ($request->textiles !== null) {
            $str .=  ' and textile_id IN('.implode(',',$request->textiles).') ';
        }

        if ($request->colors !== null) {
            $arr= [];
            $options = ProductOption::whereIn('colors_id', $request->colors)->get();
            foreach ($options as $item){
                $arr[]= $item->product_id;
            }
            $str .=  ' and id IN('.implode(',', array_unique($arr)).') ';
        }

        if ($request->sizes !== null) {
            $arr_size = [];
            $options = ProductOption::whereIn('size_id', array_unique($request->sizes))->get();
            foreach ($options as $item){
                $arr_size[]= $item->product_id;
            }
            $str .=  ' and id IN('.implode(',', $arr_size).') ';
        }

        $products = $product
           ->where([
                'category_id' => $rubric->id,
                'available' => 1
            ])
            ->whereRaw($str)
            ->with('brand', 'silhouette', 'color', 'size', 'textile')
            ->paginate(12);

//        return $str;
        if ($request->ajax()) {
            return view('ajax-tpl.filter', compact('products'))->render();
        }
    }
}
