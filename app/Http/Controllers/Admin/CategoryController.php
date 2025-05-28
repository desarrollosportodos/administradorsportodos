<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\Apiservice;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Apiservice::request('market/categories');
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        Apiservice::request('market/categories', $request->except('_token'), 1);
        //return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = Apiservice::request("market/categories/{$id}");
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        Apiservice::request("market/categories/{$id}",$request->except('_token'), 3);
        //return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Apiservice::request("market/categories/{$id}", [], 2);
        return redirect()->route('admin.categories.index');
    }
}
