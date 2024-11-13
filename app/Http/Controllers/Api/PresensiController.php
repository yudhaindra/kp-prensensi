<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
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
            ->toJson();
    }
}
