<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $canEdit = (Auth::user()->can('edit student') ? true : false);

        return view('profile.index', [
            config(['app.title' => $data->name]),
            'data'    => $data,
            'canEdit' => $canEdit,
        ]);
    }
}
