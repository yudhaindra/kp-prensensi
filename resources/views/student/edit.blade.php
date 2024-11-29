<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Edit Siswa</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-warning text-white text-center">
        <h1 class="display-4">Edit Siswa</h1>
        <p class="lead">Form ini untuk mengedit data siswa</p>
    </div>

    <hr>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>
