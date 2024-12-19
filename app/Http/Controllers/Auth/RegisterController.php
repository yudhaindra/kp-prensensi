<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('auth.register', [
            config(['app.title' => "Register"]),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn'     => ['required', 'unique:' . User::class],
            'name'     => ['required', 'string', 'max:50', 'regex:/^[\w\s]+$/', 'unique:' . User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed', Rules\Password::defaults()],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'nohp'     => ['required'],
            'alamat'   => ['required'],
            'profile'  => ['required'],
            'dob'      => ['required', 'date'],
        ]);

        $file = $request->file('profile');
        $file->storeAs(
            'profile/',
            $file->getClientOriginalName(),
            'dae'
        );

        $user = User::create([
            'nisn'            => $request->nisn,
            'name'            => $request->name,
            'password'        => Hash::make($request->password),
            'email'           => $request->email,
            'nomor_handphone' => $request->nohp,
            'alamat'          => $request->alamat,
            'profile'         => $file->getClientOriginalName(),
            'dob'             => $request->dob,
        ]);

        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user, true);

        // return response()->json([
        //     'redirect' => route('play.index'),
        // ]);

        return to_route('home');
    }
}
