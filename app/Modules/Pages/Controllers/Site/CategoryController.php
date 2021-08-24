<?php

namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ClothingSize;
use App\Models\Colors;
use App\Models\Product;
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
            $products = Product::where('category_id', $rubric->id)
                ->where('is_promotion', 1)
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-new') {
            $products = Product::where('category_id', $rubric->id)
                ->where('is_new', 1)
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-price-asc') {
            $products = Product::where('category_id', $rubric->id)
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'asc')
                ->paginate(12);
        }
        if($request->orderBy == 'sort-price-desc') {
            $products = Product::where('category_id', $rubric->id)
                ->with('brand', 'silhouette', 'color', 'size', 'textile')
                ->orderBy('price', 'desc')
                ->paginate(12);
        }
        if($request->ajax()){
            return view('ajax-tpl.sort', compact('products'))->render();
        }
    }



    public function view(Request $request, $slug)
    {
        $rubric = Category::where('slug', $slug)->with('children')->first();
        $categories =  $rubric->children;

        $products = Product::where('category_id', $rubric->id)
            ->with('brand', 'silhouette', 'color', 'size', 'textile')
            ->paginate(12);

        $brands = Brand::whereIn('id', ProductService::getArrayItems($products, 'brand'))->get();
        $colors = Colors::whereIn('id', ProductService::getArrayItemsOptions($products))->get();
        $silhouettes = Silhouette::whereIn('id', ProductService::getArrayItems($products, 'silhouette'))->get();
        $textiles = Textile::whereIn('id', ProductService::getArrayItems($products, 'textile'))->get();
        $sizes = ClothingSize::whereIn('id', ProductService::getArrayItemsOptions($products, 'size_id'))->get();

          return view('Pages::site.categories.view', compact(
              'categories',
              'brands',
              'colors',
              'silhouettes',
              'textiles',
              'sizes',
              'rubric',
              'products'
          ));
    }


}
