<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $product;
    protected $cartProducts;

    public function addToCart (Request $request)
    {
        $this->product = Product::find($request->product_id);
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->selling_price,
            'quantity' => $request->qty,
            'attributes' => [
                'image' => $this->product->image,
            ],
        ]);

        if (!$request->ajax()) {
            return redirect()->back()->with('message', 'Cart added successfully..');
        }else{
            return json_encode('Cart added successfully..');
        }

    }

    public function viewCart()
    {
        $this->cartProducts = Cart::getContent();
        return view('front.cart.view', [
            'cartProducts' => $this->cartProducts,
            'total' => Cart::getTotal(),
        ]);
    }

    public function removeProductFromCart($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('message', 'Product Deleted..');
    }
}
