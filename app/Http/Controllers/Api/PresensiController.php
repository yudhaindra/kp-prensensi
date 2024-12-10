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
    public function index(Request $request)
    {
        $data = Presensi::query();

        return DataTables::eloquent($data)
            ->orderColumn('created_at', '-created_at $1')
            ->addColumn('intro', function (Presensi $presensi) {

                $created = Carbon::parse($presensi->created_at);
                $expired = $created->addHours(12);

                // if ($created->diffInHours($expired)) {
                //     return '<button type="button" class="btn btn-primary btn-sm">Presensi</button>';
                // }

                return 'time: ' . $created . " " . $expired;
            })
            ->rawColumns(['intro'])
            ->toJson();
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
}
