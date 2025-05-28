<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\ApiService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = ApiService::request('market/categories');
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        ApiService::request('market/categories', $request->except('_token'), 1);
        //return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = ApiService::request("market/categories/{$id}");
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        ApiService::request("market/categories/{$id}",$request->except('_token'), 3);
        //return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        ApiService::request("market/categories/{$id}", [], 2);
        return redirect()->route('admin.categories.index');
    }
}
