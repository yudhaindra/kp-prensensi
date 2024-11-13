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
    public function index(Request $request)
    {
        return view('auth.login', [
            config(['app.title' => "Login"]),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function dae(Request $request)
    {
        // $request->validate([
        //     'id' => ['required'],
        // ]);

        Auth::loginUsingId($request->id);

        return to_route('home');
    }
}
