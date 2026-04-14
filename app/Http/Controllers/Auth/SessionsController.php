<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validate
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        // attempt to log the user in
        if (Auth::attempt($validated)) {
            
            $request->session();
            // redirect to home page
            return redirect('home');
        };
    }

    
    public function destroy()
    {
        Auth::logout();
        return redirect('login');
    }
}
