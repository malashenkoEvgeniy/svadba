<?php

namespace App\Widgets;

use App\Models\Category;

class CatalogWidget implements ContractWidget
{
    public function execute(){
        $categories = Category::where('parent_id', 0)->get();
        return view('Widgets::catalog', [
            'categories' => $categories
        ]);
    }

}
