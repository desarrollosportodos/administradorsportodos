<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\ApiService;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = ApiService::request('market/subcategories');
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = ApiService::request('market/categories');
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        ApiService::request('market/subcategories', $request->all(), 1);
        return redirect()->route('admin.subcategories.index');
    }

    public function edit($id)
    {
        $subcategory = ApiService::request("market/subcategories/{$id}");
        $categories = ApiService::request('market/categories');
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        ApiService::request("market/subcategories/{$id}", $request->all(), 3);
        return redirect()->route('admin.subcategories.index');
    }

    public function destroy($id)
    {
        ApiService::request("market/subcategories/{$id}", [], 2);
        return redirect()->route('admin.subcategories.index');
    }
}

