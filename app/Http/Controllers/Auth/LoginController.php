<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        //validavimas
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login detail');
        }

        return redirect()->route('dashboard');
    }
}