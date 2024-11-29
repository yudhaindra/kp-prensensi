<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid bg-dark text-white text-center">
        <h1 class="display-4">Tampil Data</h1>
        <p class="lead">Form ini untuk menampilkan data siswa </p>
    </div>
    <div class="container">
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA</th>
                <th scope="col">UMUR</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">FOTO SISWA</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    {{-- <td>{{ $student->id }}</td> --}}
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->nama }}</td>
                    <td>{{ $student->umur }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td>{{ $student->gambar }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action Buttons">
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm mr-1">Update</a>
                            <form method="POST" action="{{ route('students.destroy', ['student' => $student->id]) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" style="margin-right : 3px">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data siswa.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>
