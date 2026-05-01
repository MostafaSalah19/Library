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

        return response()->json(['categories'=>$data], 200);
    }
}
