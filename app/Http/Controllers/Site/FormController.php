<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\FittingForm;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function fitting(Request $request)
    {
//        dd($request);
        FittingForm::create($request->except('_token'));
        return redirect()->back();
    }

    public function order(Request $request)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);
        dd($request, \Cart::getContent());
        if($request->payment_method == 'bank'){
            dd(123);
        }
//        FittingForm::create($request->except('_token'));
//        return redirect()->back();
    }
}
