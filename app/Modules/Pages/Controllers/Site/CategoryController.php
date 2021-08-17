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



    public function view($slug)
    {
        $rubric = Category::where('slug', $slug)->with('children')->first();
        $categories =  $rubric->children;

        $products = Product::where('category_id', $rubric->id)
            ->with('brand', 'silhouette', 'color', 'size', 'textile')
            ->get();
//            ->paginate(12);

        $brands = Brand::whereIn('id', ProductService::getArrayItems($products, 'brand'))->get();
        $colors = Colors::whereIn('id', ProductService::getArrayItems($products, 'color'))->get();
        $silhouettes = Silhouette::whereIn('id', ProductService::getArrayItems($products, 'silhouette'))->get();
        $textiles = Textile::whereIn('id', ProductService::getArrayItems($products, 'textile'))->get();
        $sizes = ClothingSize::whereIn('id', ProductService::getArrayItems($products, 'size'))->get();

        $products = Product::where('category_id', $rubric->id)
            ->with('brand', 'silhouette', 'color', 'size', 'textile')
            ->paginate(12);

          return view('Pages::site.categories.view', compact(
              'categories',
              'brands',
              'colors',
              'silhouettes',
              'textiles',
              'sizes',
              'products'
          ));

    }
}
