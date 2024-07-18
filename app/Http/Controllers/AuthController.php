<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:owner')->only(['index', 'store']);
        $this->middleware('auth:owner')->only('logout');
    }

    public function index()
    {
        return view("bo.auth.login");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");

        if (RateLimiter::tooManyAttempts($request->email, 6)) {
            $seconds = RateLimiter::availableIn($request->email);
            $second  = $seconds <= 60 ? $seconds.' detik' : ceil($seconds/60).' menit';  
            return redirect()->back()->with('error', 'Anda sudah melakukan 6 kali percobaan silakan tunggu '.$second.' lagi untuk mencoba login kembali');
        }

        $authenticated = auth()->guard("owner")->attempt($credentials, $request->remember);
        if (!$authenticated) {
            RateLimiter::hit($request->email, 1800);
            return redirect()->back()->with("error", "login failed");
        }

        RateLimiter::clear($request->email);

        // dd(Auth::guard("owner")->check());

        return redirect()->intended("/dashboard");
    }

    public function logout()
    {
        auth()->guard("owner")->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route("login");
    }
}
