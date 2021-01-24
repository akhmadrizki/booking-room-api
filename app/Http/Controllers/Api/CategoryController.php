<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryRoom;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryRoom::select('id', 'category')
            ->latest()
            ->get();

        return response()->json($categories);
    }
}
