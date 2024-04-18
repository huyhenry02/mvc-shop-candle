<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CheckoutController extends Controller
{

    public function indexCart(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $this->calculateTotalPrice($carts);
        return view('user.cart.index',
            [
                'carts' => $carts,
                'totalPrice' => $totalPrice
            ]);
    }
    public function indexCheckout(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Auth::id();
        $order = Order::where('user_id', $userId)->first();
        $orderId = $order->id;
        $cartItems = Cart::where('order_id', $orderId)->get();
        $totalPrice = $this->calculateTotalPrice($cartItems);
        return view('user.order.checkout', ['cartItems' => $cartItems, 'order' => $order, 'orderId' => $orderId, 'totalPrice' => $totalPrice]);
    }

    public function indexConfirmation(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $userId = Auth::id();
        $order = Order::where('user_id', $userId)->first();
        $orderId = $order->id;
        $cartItems = Cart::where('order_id', $orderId)->get();
        return view('user.order.confirmation', ['order' => $order, 'cartItems' => $cartItems, 'orderId' => $orderId]);

    }
    public function calculateTotalPrice($carts): float|int
    {
        $totalPrice = 0;

        foreach ($carts as $cart) {
            $totalPrice += $cart->product->price * $cart->quantity;
        }

        return $totalPrice;
    }
    public function createOrder(): RedirectResponse
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $totalPrice = $this->calculateTotalPrice($cartItems);
        $order->total = $totalPrice;
        $order->save();
        $order->code = 'K' . $order->id;
        foreach ($cartItems as $cartItem) {
            $cartItem->order_id = $order->id;
            $cartItem->save();
        }
        return redirect()->route('user.order.checkout', ['orderId' => $order->id]);
    }

    public function approvedOrder($orderId, Request $request): RedirectResponse
    {
        $order = Order::find($orderId);
        $order->fill($request->all());
        $order->status = 'shipping';
        $order->save();
        return redirect()->route('user.order.confirmation')->with('success', 'Đơn hàng của bạn đã được tạo');

    }
}
