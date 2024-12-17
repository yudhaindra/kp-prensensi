<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        // Tampilkan view untuk form edit
        
        return view('user.edit', [
            config(['app.jumbotron' => "warning"]),
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn'     => ['required', 'unique:' . User::class],
            'name'     => ['required', 'string', 'max:50', 'regex:/^[\w\s]+$/', 'unique:' . User::class],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'nomor_handphone'     => ['required'],
            'alamat'   => ['required'],
        ]);
    
        
        $user = User::findOrFail($id);
    
        
       
    
        $user->update([
            'nisn' => $request->nisn,
            'name'   => $request->name,
            'password' => bcrypt($request->password),
            'email'  => $request->email,
            'nomor_handphone' => $request->nomor_handphone,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // dd($user);
    
        $user->delete();
    
        return redirect()->route('user.index')
            ->with('success', 'Data Guru berhasil dihapus.');
    }
}
