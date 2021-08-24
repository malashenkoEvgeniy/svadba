<?php


namespace App\Modules\Cart\Controllers\Site;

use App\Http\Controllers\Site\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MainPage;
use App\Models\MainSlider;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends BaseController
{
    public function index()
    {


        return view('Cart::site.cart.index');
    }

    public function addToCart(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        if(!isset($_COOKIE['cart_id'])){
            setcookie('cart_id', uniqid());
            $cart_id = $_COOKIE['cart_id'];
            \Cart::session($cart_id);
//            \Cart::add([
//                'id' => $product->id,
////                'name' => $product->translate()->title,
////                'price' => ($product->is_promotion) ? $product->new_price : $product->price,
//                'quantity' => 1,
//                'attributes' => [
////                    'img' => $product->attachments[0]->img_prev,
////                    'size'=>$request->size,
////                    'color'=>$request->color
//                ]
//            ]);
            Cart::add( 455 , 'Sample Item' , 100.99 , 2 , array ());
//            \Cart::add(array(
//                'id' => 456, // inique row ID
//                'name' => 'Sample Item',
//                'price' => 67.99,
//                'quantity' => 4,
//                'attributes' => array()
//            ));

        }
//        return response()->json($request->id);
        return response()->json(\Cart::getContent());

    }
}
