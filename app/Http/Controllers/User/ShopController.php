<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class ShopController extends Controller
{
    public function index(): string
    {
        $products = Product::all();
        return view('user.shop.index', [
            'products' => $products
        ]);
    }

    public function addToCart($product_id, $quantity): RedirectResponse
    {
        try {
            Cart::create([
                'product_id' => $product_id,
                'user_id' => auth()->id(),
                'quantity' => $quantity
            ]);
            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi');
        }
    }

    public function removeFromCart($id): RedirectResponse
    {
        Cart::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product was removed from cart');
    }
}
