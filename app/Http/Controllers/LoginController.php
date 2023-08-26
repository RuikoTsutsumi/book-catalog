<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
      if (Auth::guard('members')->user()) {
        return redirect()->route('mypage.dashboard');
       }
      return view('login.index');
    }
  
    public function login(Request $request)
    {
      $credentials = $request->only(['email', 'password']);
  
      if (Auth::guard('members')->attempt($credentials)) {
        return redirect()->route('mypage.dashboard')->with([
          'login_msg' => 'ログインしました。',
        ]);
      }
  
      return back()->withErrors([
        'login' => ['ログインに失敗しました'],
      ]);
    }
  
    public function logout(Request $request)
    {
      Auth::guard('members')->logout();
      $request->session()->regenerateToken();
  
      return redirect()->route('login.index')->with([
        'auth' => ['ログアウトしました'],
      ]);
    }
}
