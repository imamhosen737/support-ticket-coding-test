<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function loginShow()
    {

        if (Auth::check()) {
            return redirect()->route('admin-dashboard');
        } else {
            return view('auth.admin_login');
        }
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.index');
        } else {
            return view('auth.admin_login');
        }
    }

    public function authCheck(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|min:6',
            'password' => 'required|min:6'
        ]);

        try {
            $credential = $request->only('username', 'password');
            // return Auth::($credential);
            // dd(Auth::attempt($credential));
            if (Auth::attempt($credential)) {
                return redirect()->route('admin-dashboard');
            } else {
                return redirect()->back()->with('error', 'Username or Password Incorrect !');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Username or Password Incorrect !' . $th->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin-login');
    }
}
