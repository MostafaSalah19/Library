<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class categoriesController extends Controller
{
    public function index()
    {

        $data = Category::paginate(10);

        return response()->json(['categories' => $data], 200);
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json(['message' => 'Category created successfully'], 201);
    }

    public function show($id)
    {
        $data = Category::find($id);
        if (!$data) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json(['data' => $data], 200);
    }
}
