<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{
    //
    public function index(){
        if (Auth::check()) {
            return redirect()->route('Dashboard');
        }
        return view('authentication.login');
    }

    public function login(Request $request){
        $data = [];

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $data['status'] = "true";
            $data['content'] = "Đăng nhập thành công";
        }else{
            $data['status'] = "false";
            $data['content'] = "Đăng nhập không thành công! Vui lòng kiểm tra lại thông tin!";
        }

        return response()->json($data);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function Error403() {
        return view('error.403');
    }

}
