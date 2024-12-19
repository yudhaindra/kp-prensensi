<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('student.show', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => ['required'],
            'nama' => ['required'],
            'umur' => ['required'],
            'alamat' => ['required'],
            'file' => ['required'],
        ]);

        $file = $request->file('file');

        $file->move('images', $file->getClientOriginalName());

        Student::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'gambar' => 'images/' . $file->getClientOriginalName(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data siswa berdasarkan ID
        $student = User::findOrFail($id);

        $canEdit = (Auth::user()->can('edit student') ? true : false);

        // Tampilkan view untuk form edit
        // return view('student.edit', compact('student'));
        return view('student.edit', [
            config(['app.jumbotron' => "danger"]),
            'student' => $student,
            'canEdit' => $canEdit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nisn' => ['required'],
            'nama'   => ['required'],
            'umur'   => ['required', 'integer'],
            'alamat' => ['required'],
            'gambar'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);


        $student = Student::findOrFail($id);


        if ($request->hasFile('file')) {
            if (file_exists(public_path($student->gambar))) {
                unlink(public_path($student->gambar));
            }


            $file = $request->file('file');
            $file->move('images', $file->getClientOriginalName());
            $student->gambar = 'images/' . $file->getClientOriginalName();
        }

        $student->update([
            'nisn' => $request->nisn,
            'nama'   => $request->nama,
            'umur'   => $request->umur,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        // dd($student);

        if (file_exists(public_path($student->gambar))) {
            unlink(public_path($student->gambar));
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
