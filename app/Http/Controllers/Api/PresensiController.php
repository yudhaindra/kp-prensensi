<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\PresensiUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PresensiController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'pertemuan' => ['required'],
            'name'      => ['required'],
            'expired'   => ['required'],
        ]);

        $data = Presensi::create([
            'pertemuan'  => $request->pertemuan,
            'name'       => $request->name,
            'expired_at' => $request->expired,
        ]);

        return to_route('dashboard.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => ['required'],
            'presensi_id' => ['required'],
        ]);

        $user = User::findOrFail($request->user_id);

        $presensi = Presensi::findOrFail($request->presensi_id);

        PresensiUser::create([
            'user_id'     => $user->id,
            'presensi_id' => $presensi->id,
        ]);

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $uuid)
    {
        $data = Presensi::findOrFail($uuid);

        dd($data);
    }
}
