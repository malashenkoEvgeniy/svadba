<?php

namespace App\Modules\Pages\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BaseController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Silhouette;
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
        if ($rubric->id ==3 || $rubric->parent_id == 3 ) {
            $silhouettes = null;
        } else {
            $silhouettes = Silhouette::all();
        }
        $products = Product::where('category_id', $rubric->id)->paginate(12);


          return view('Pages::site.categories.view', compact('categories', 'silhouettes', 'products'));

    }
}
