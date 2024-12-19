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
        $users = User::all();
        
        return view('user.index', compact('users'));
    }
    
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $users = User::findOrFail($id);

        // Hapus role sebelumnya dan tambahkan role baru
        $users->syncRoles($request->input('role'));

        return redirect()->route('user.index')->with('success', 'Role updated successfully!');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);

        // Tampilkan view untuk form edit
        
        return view('user.edit', [
            config(['app.jumbotron' => "warning"]),
            'user' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn'            => ['required', 'unique:' . User::class],
            'name'            => ['required', 'string'],
            'password'        => ['required', 'string', 'max:50', 'regex:/^[\w\s]+$/', 'unique:' . User::class],
            'email'           => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'nomor_handphone' => ['required'],
            'alamat'          => ['required'],
        ]);
    
        
        $users = User::findOrFail($id);
    
        
       
    
        $users->update([
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
        $users = User::findOrFail($id);

        // dd($user);
    
        $users->delete();
    
        return redirect()->route('user.index')
            ->with('success', 'Data Guru berhasil dihapus.');
    }
}
