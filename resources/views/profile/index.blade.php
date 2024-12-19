@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    @include('layouts.header')

    <div class="container my-5">
        <div class="row">

            <div class="col-md-4">
                <img src="{{ $data->getProfile() }}" class="img-fluid rounded-1" alt="...">
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('students.update', $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="exampleNisn">NISN</label>
                                <input type="text" class="form-control" placeholder="Masukkan nisn" name="nisn"
                                    value="{{ old('nisn', $data->nisn) }}" @disabled(!$canEdit) required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleName">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama"
                                    value="{{ old('nama', $data->name) }}" @disabled(!$canEdit) required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleAddress">Alamat</label>
                                <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat"
                                    value="{{ old('alamat', $data->alamat) }}" @disabled(!$canEdit) required>
                            </div>

                            @if ($canEdit)
                                <div class="form-group mb-3">
                                    <label for="profile">Profile</label><br>
                                    <input class="form-control" type="file" id="profile" name="profile"
                                        @disabled(!$canEdit) required>
                                </div>
                            @endif

                            <div class="mt-3">
                                @if ($canEdit)
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                @endif
                                <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
