<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Tambah Guru</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-primary text-white text-center">
        <h1 class="display-4">Tambah Guru</h1>
        <p class="lead">Form untuk menambah data guru</p>
    </div>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" placeholder="Masukkan NIP" name="nip">
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
            </div>

            <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" class="form-control" placeholder="Masukkan Umur" name="umur">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat">
            </div>

            <div class="form-group">
                <label for="gambar">Foto Guru</label>
                <input type="file" class="form-control" name="gambar">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
