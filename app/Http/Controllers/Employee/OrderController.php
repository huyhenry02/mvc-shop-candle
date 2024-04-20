<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $orders = Order::all();
        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function edit(Order $order): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $details = $order->cartItems;
        return view('admin.order.edit', [
            'order' => $order,
            'details' => $details
        ]);
    }

    public function update(Order $order, Request $request): RedirectResponse
    {
        $order->fill($request->all());
        $order->save();
        return redirect()->route('admin.order.index');
    }
}
