<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Site\BaseController;
use App\Models\Product;
use App\Models\translates\ProductTranslate;
use Illuminate\Http\Request;

class Select2SearchController extends BaseController
{
    public function index()
    {
        return view('site.search.index');
    }

    public function selectSearch(Request $request)
    {

        $products = [];

        if($request->has('q')){
            $search = $request->q;
            $products =ProductTranslate::select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($products);
    }
}
