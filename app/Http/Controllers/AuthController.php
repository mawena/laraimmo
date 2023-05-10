<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'))->with(['success', 'Bienvenue, Vous êtes maintenant connecté']);
        }

        return back()->withErrors(
            ['email' => "Identifiants incorect"]
        )->onlyInput("email");
    }

    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'vous être maintenant deconnecté');
    }
}