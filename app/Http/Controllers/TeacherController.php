<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teachers = Teacher::all();

        return view('teacher.index', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip' => ['required'],
            'nama' => ['required'],
            'umur' => ['required', 'integer'],
            'alamat' => ['required'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        $file = $request->file('gambar');

        $file->move('images/teachers', $file->getClientOriginalName());

        Teacher::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'gambar' => 'images/teachers/' . $file->getClientOriginalName(),
        ]);

        return redirect()->route('teachers.index')
            ->with('success', 'Teacher successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Teacher::findOrFail($id);

        dd($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Ambil data siswa berdasarkan ID
        $teachers = Teacher::findOrFail($id);

        // dd($teachers);

        // Tampilkan view untuk form edit
        return view('teacher.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nip' => ['required'],
            'nama'   => ['required'],
            'umur'   => ['required', 'integer'],
            'alamat' => ['required'],
            'gambar'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
    
        
        $teachers = Teacher::findOrFail($id);
    
        
        if ($request->hasFile('file')) {
            if (file_exists(public_path($teachers->gambar))) {
                unlink(public_path($teachers->gambar));
            }
    
        
            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            $teachers->gambar = 'images/' . $file->getClientOriginalName();
        }
    
        $teachers->update([
            'nip' => $request->nip,
            'nama'   => $request->nama,
            'umur'   => $request->umur,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('teachers.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teachers = Teacher::findOrFail($id);

        // dd($teachers);
    
        if (file_exists(public_path($teachers->gambar))) {
            unlink(public_path($teachers->gambar));
        }
    
        $teachers->delete();
    
        return redirect()->route('teacher.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
