<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Site\BaseController;
use App\Models\Product;
use App\Models\translates\ProductTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2SearchController extends BaseController
{
    public function index(Request $request)
    {
        if(isset($request->q)){
            $product = Product::where('id', $request->q)->first();
            return redirect()->route('page.view', ['slug'=>$product->slug]);
        }

    }

    public function selectSearch(Request $request)
    {

        $products = [];

        if($request->has('q')){
            $search = $request->q;
            $result = [];
            $products = DB::table('products')
                ->join('product_translates', 'products.id', '=', 'product_translates.product_id')
                ->select("products.id", "products.slug",  "product_translates.title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
            foreach ($products as $product){
                $result[] = $product;
            }

            $brands = DB::table('brands')
                ->join('brand_translates', 'brands.id', '=', 'brand_translates.brand_id')
                ->select("brands.id",  "brand_translates.title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
            if(count($brands)>0){

                foreach ($brands as $brand){
                    $res = DB::table('products')
                        ->join('product_translates', 'products.id', '=', 'product_translates.product_id')
                        ->select("products.id", "products.slug",  "product_translates.title")
                        ->where('brand_id', $brand->id)
                        ->get();
                    foreach ($res as $item) {
                        $result[] = $item;
                    }
                }
            }
        }
//        if($request->ajax()){
//            return view('ajax-tpl.search', [
//                'products'=>$result
//            ])->render();
//        }
        return response()->json($result);
    }
}
