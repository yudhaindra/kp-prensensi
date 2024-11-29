<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Tambah Siswa</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-primary text-white text-center">
        <h1 class="display-4">Tambah Siswa</h1>
        <p class="lead">Form ini untuk menambah data siswa </p>
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

    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleName">Nama </label>
            <input type="text" class="form-control" placeholder="Masukkan Nama  " name="nama">
        </div>

        <div class="form-group">
            <label for="exampleAge">Umur </label>
            <input type="number" class="form-control" placeholder="Masukkan umur  " name="umur">
        </div>

        <div class="form-group">
            <label for="exampleAddress">Alamat </label>
            <input type="text" class="form-control" placeholder="Masukkan Alamat  " name="alamat">
        </div>

        <div class="form-group">
            <label for="exampleImage">Foto Siswa </label>
            <input type="file" class="form-control" name="file">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
