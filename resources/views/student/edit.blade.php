@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    @include('layouts.header')

    @include('layouts.alert')

    <div class="container mb-5">
        <div class="row">

            <div class="col-md-4">
                <div class="card mb-3">
                    <img src="{{ $student->getProfile() }}" class="card-img-top" alt="{{ $student->name }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $student->name }}
                        </h5>
                        <p class="card-text">
                            {{ $student->alamat }}
                        </p>
                        <p class="card-text">
                            <small class="text-body-secondary">
                                {{ \Carbon\Carbon::parse($student->dob)->age }}
                            </small>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="exampleNisn">NISN</label>
                        <input type="text" class="form-control" placeholder="Masukkan nisn" name="nisn"
                            value="{{ old('nisn', $student->nisn) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleName">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama"
                            value="{{ old('nama', $student->name) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleAddress">Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat"
                            value="{{ old('alamat', $student->alamat) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="profile">Profile</label><br>
                        <input class="form-control" type="file" id="profile" name="profile" required>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
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
