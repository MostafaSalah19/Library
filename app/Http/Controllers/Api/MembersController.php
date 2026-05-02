<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Http\Requests\CreateMemberRequest;

class MembersController extends Controller
{
    public function index()
    {
        $data = Member::paginate(10);
        return response()->json(['members' => $data], 200);
    }


    public function store(CreateMemberRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->joined_at = now();
        $member->position = $request->position;
        $member->save();
        return response()->json(['message' => 'Member created successfully'], 201);
    }

    public function show($id)
    {
        $data = Member::find($id);
        if (!$data) {
            return response()->json(['error' => 'Member not found'], 404);
        }

        return response()->json(['data' => $data], 200);
    }
}
