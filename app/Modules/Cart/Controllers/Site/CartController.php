<?php


namespace App\Modules\Cart\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\ProductOption;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function index()
    {
        return view('Cart::site.cart.index');
    }

    public function addToCart(Request $request)
    {

        $product = ProductOption::where([
            'product_id'=> $request->id,
            'colors_id'=>$request->color,
            'size_id'=>$request->size
        ])->first();
        if(!$product){
            return  false;
        }
        $cart_id = $_COOKIE['cart_id'];

        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->product->translate()->title,
            'price' => ($product->product->is_promotion) ? $product->product->new_price : $product->product->price,
            'quantity' => (int)$request->quantity,
            'attributes' => [
                'img' => $product->product->attachments[0]->img_prev,
                'size'=>$product->sizes->size,
                'color'=>$product->colors->translate()->title,
                'meaning'=>$product->colors->meaning
            ]
        ]);

        if($request->ajax()){
            return view('ajax-tpl.cart', ['options'=>\Cart::getContent()])->render();
        }

    }

    public function showToCart(Request $request)
    {
        $cart_id = $_COOKIE['cart_id'];

        \Cart::session($cart_id);
//       return response()->json(\Cart::getContent());

        if($request->ajax()){
            return view('ajax-tpl.cart', ['options'=>\Cart::getContent()])->render();
        }

    }


    public function removeFromCart(Request $request, $id)
    {
        \Cart::session( $_COOKIE['cart_id'])->remove($id);
        return redirect()->back();
    }
}
