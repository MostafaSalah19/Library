<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Models\Member;
use Illuminate\Http\Request;



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::paginate(10);
        return view('members.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMemberRequest $request)
    {
        $member = new Member();
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->joined_at = now();
        $member->position = $request->position;
        $member->save();
        return redirect()->route('members.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $member = Member::find($id);
        return view('members.update', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateMemberRequest $request,  $id)
    {
        $member = Member::find($id);
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->position = $request->position;
        $member->save();
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index');  
    }
}
