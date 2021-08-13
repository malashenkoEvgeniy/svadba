<?php

namespace App\Widgets;

use App\Models\Category;
use App\Models\Page;

class CatalogWidget implements ContractWidget
{
    protected $is_category;

    public function __construct($is_category = 1){

        if ($is_category !== 1){
            $this->is_category = $is_category;
        } else {
            $this->is_category = 1;
        }
    }
    public function execute(){
        if ($this->is_category !== 1){
            $services = Page::where('parent_id', 2)->get();
            return view('Widgets::service', [
                'services' => $services
            ]);
        }

        $categories = Category::where('parent_id', 0)->get();
        return view('Widgets::catalog', [
            'categories' => $categories
        ]);
    }

}
