<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = CategoryRoom::latest()->get();
        return view('interfaces.dashboard.listCategories')
            ->withCategories($categories);
    }

    public function store(Request $request)
    {
        $field = ['category' => $request->category];
        CategoryRoom::create($field);

        return redirect()->route('index.category')->with('success', 'Kategori berhasil ditambahkan');
    }
}
