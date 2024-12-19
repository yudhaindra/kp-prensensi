<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $students = User::role('student')->get();

        $roles = Role::all();

        return view('account.index', [
            config(['app.title' => "Account"]),
            'user'     => $user,
            'students' => $students,
            'roles'    => $roles,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'profile'  => ['required'],
        ]);

        $file = $request->file('profile');
        $file->storeAs(
            'profile/',
            $file->getClientOriginalName(),
            'dae'
        );

        $user = Auth::user();
        $user->profile = $file->getClientOriginalName();
        $user->save();

        return back();
    }
}
