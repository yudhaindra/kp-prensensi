<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $dataPresensi = Presensi::with(['users' => function ($query) use ($user) {
            $query->where('users.id', $user->id);
        }])->latest()->get();

        $students = User::role('student')->get();

        $teachers = User::role('teacher')->get();

        return view('dashboard.index', [
            config(['app.title' => "Dashboard"]),
            'dataPresensi' => $dataPresensi,
            'students'     => $students,
            'teachers'     => $teachers,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $user->assignRole('admin');
        }

        return to_route('home');
    }

    
}
