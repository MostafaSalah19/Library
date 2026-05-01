<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;

class MembersController extends Controller
{
    public function index()
    {
        $data = Member::paginate(10);
        return response()->json(['members'=>$data], 200);
    }
}
