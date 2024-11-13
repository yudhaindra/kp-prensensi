<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
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
        return view('dashboard.index', [
            config(['app.title' => "Dashboard"]),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function admin(Request $request)
    {
        $user = Auth::user();
        $user->assignRole('admin');

        return to_route('home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'pertemuan' => ['required'],
            'name'      => ['required'],
        ]);

        $data = Presensi::create([
            'pertemuan' => $request->pertemuan,
            'name'      => $request->name,
        ]);

        // return view('dashboard.index', [
        //     config(['app.title' => "Dashboard"]),
        // ]);

        return to_route('dashboard.index');
    }
}
