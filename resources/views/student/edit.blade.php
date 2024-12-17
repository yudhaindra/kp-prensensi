@extends('layouts.app')

@section('content')

    @include('layouts.jumbotron')

    @include('layouts.alert')

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            
                    <div class="form-group">
                        <label for="exampleNisn">NISN</label>
                        <input type="text" class="form-control" placeholder="Masukkan nisn" name="nisn" value="{{ old('nisn', $student->nisn) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleName">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="{{ old('nama', $student->nama) }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="exampleAge">Umur</label>
                        <input type="number" class="form-control" placeholder="Masukkan Umur" name="umur" value="{{ old('umur', $student->umur) }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="exampleAddress">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat', $student->alamat) }}" required>
                    </div>
            
                    <div class="form-group">
                        <label for="exampleImage">Foto Siswa</label><br>
                        <img src="{{ asset($student->gambar) }}" alt="Foto Siswa" width="150" class="mb-3">
                        <input type="file" class="form-control" name="file">
                    </div>
            
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="bg-dark text-white py-3 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} SMA Immanuel Kalasan. All Rights Reserved.</p>
        </div>
    </footer>
@endsection
