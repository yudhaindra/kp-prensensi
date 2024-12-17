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
    <div class="p-5 mb-4 bg-dark text-white">
        <div class="container-fluid py-5">
            <div class="row align-items-center">
                <!-- Gambar di Kiri -->
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="{{ asset('images/teachers/logoimka.png') }}" alt="Logo SMA Immanuel Kalasan"
                        class="img-fluid" style="width: 200px;">
                </div>
                <!-- Judul dan Deskripsi -->
                <div class="col-md-9">
                    <h1 class="display-4">IM-CLASS</h1>
                    <p class="lead">Tampil Data</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NISN</th>
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->umur }}</td>
                        <td>{{ $student->alamat }}</td>
                        <td>{{ $student->gambar }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Action Buttons">
                                <a href="{{ route('students.edit', $student->id) }}"
                                    class="btn btn-warning btn-sm mr-1">Update</a>
                                <form method="POST"
                                    action="{{ route('students.destroy', ['student' => $student->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        style="margin-right: 3px">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Tidak ada data siswa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <footer class="footer bg-dark text-white">
        <div class="container py-5">
            <div class="row">
                <!-- Logo dan Informasi -->
                <div class="col-md-4">
                    <img src="logo.png" alt="Logo SMA Immanuel Kalasan" class="mb-3" style="width: 120px;">
                    <h5>SMA IMMANUEL KALASAN</h5>
                    <p>TERAKREDITASI "B"</p>
                    <p class="text-muted">Sukses Meraih Masa Depan</p>
                    <address>
                        Jalan Solo KM 15<br>
                        Gampar, Tamanmartani, Kalasan, Sleman,<br>
                        Yogyakarta<br>
                        Telp : 0274 4469287<br>
                        Email : smaimmanuelkalasan@gmail.com
                    </address>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
