<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use App\Models\PresensiUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Mpdf\Mpdf;

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
        $users = User::all();

        $data = Presensi::where('uuid', $uuid)->firstOrFail();

        return view('presensi.show', [
            config(['app.title' => $data->name]),
            'data'  => $data,
            'users' => $users,
        ]);
    }

    function download_pdf($uuid)
    {
        // Initialize mPDF
    $mpdf = new Mpdf();

    // Fetch data based on UUID
    $data = Presensi::where('uuid', $uuid)->firstOrFail();

    // Get all users
    $users = User::all();

    // Render the view with the data and users
    $html = view('presensi.show', [
        'data'  => $data,
        'users' => $users,
    ])->render();  // Use render() to return the view content as a string

    // Write the HTML to the PDF
    $mpdf->WriteHTML($html);

    // Output the PDF for download ('D' forces download)
    $mpdf->Output('download-rekap-presensi.pdf', 'D');
    }
    
}
