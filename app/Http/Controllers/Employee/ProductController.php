<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $products = Product::all();
        return view('admin.product.index', ['products' => $products]);
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'sale' => $request->sale,
            'description' => $request->description,
        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = $image->getClientOriginalName();
            $image->storeAs('products/' . $product->id, $filename, 'public');
            $product->update(['images' => $filename]);
        }
        return redirect()->route('admin.product.index');
    }

    public function show(Product $product): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.show', ['product' => $product]);
    }

    public function edit(Product $product): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.product.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale' => $request->sale,
            'description' => $request->description,
        ]);
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $filename = $image->getClientOriginalName();
            $image->storeAs('products/' . $product->id, $filename, 'public');
            $product->update(['images' => $filename]);
        }
        return redirect()->route('admin.product.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
