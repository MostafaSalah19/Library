<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\CreateAuthorRequest;


class AuthorController extends Controller
{
    public function index(){
        // $data = Author::withTrashed()   ->orderby('id','ASC')->get();

        $data= Author::paginate(10);
        return response()->json(['authors'=>$data], 200);
    }
}



