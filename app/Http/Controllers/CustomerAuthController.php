<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function loginShow()
    {
    
      if (Auth::guard('customer')->check()) {
        return redirect()->route('dashboard');
      } else {
        return view('auth.login');
      }
    }
  
    public function dashboard(){
      if (Auth::guard('customer')->check()) {
        return view('admin.index');
      } else {
        return view('auth.login');
      }
    }
  
    public function authCheck(Request $request)
    {
    //   dd($request->all());
      $request->validate([
        'username' => 'required|min:6',
        'password' => 'required|min:6'
      ]);
  
      try {
            $credential = $request->only('username', 'password');
            // return Auth::guard('customer')->attempt($credential);
            if(Auth::guard('customer')->attempt($credential)){
              return redirect()->route('dashboard');
            }
            else{
                return redirect()->back()->with('error', 'Username or Password Incorrect !');
            }    
          } catch (\Throwable $th) {
              return redirect()->back()->with('error', 'Username or Password Incorrect !'. $th->getMessage());
          }
    }
  
    public function logout()
    {
      Auth::guard('customer')->logout();
      return redirect()->route('login');
    }
}
