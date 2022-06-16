<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check() === true) {
            return redirect()->route('admin.cliente.index');
        } else {
            return view('auth.login');
        }
    }

    public function authenticate(LoginAuthRequest $request)
    {
        $credenciais = $request->safe()->only(['email', 'password']);

        if(Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect()->route('admin.cliente.index');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        Session::flush();

        return redirect()->route('login');
    }
}
