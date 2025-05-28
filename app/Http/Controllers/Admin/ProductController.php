<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\ApiService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ApiService::request('market/products');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $subcategories = ApiService::request('market/subcategories');
        return view('admin.products.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $product = ApiService::request('market/products', $request->all(), 1);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                ApiService::request('market/product-images', [
                    'product_id' => $product['id'],
                    'image_path' => $path
                ], 1);
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = ApiService::request("market/products/{$id}");
        $subcategories = ApiService::request('market/subcategories');
        return view('admin.products.edit', compact('product', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        ApiService::request("market/products/{$id}", $request->all(),3);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('product_images', 'public');
                ApiService::request('market/product-images', [
                    'product_id' => $id,
                    'image_path' => $path
                ], 1);
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        ApiService::request("market/products/{$id}", [],2);
        return redirect()->route('admin.products.index');
    }
}

