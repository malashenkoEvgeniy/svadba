<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {

        return view('site.catalog');
    }
}
