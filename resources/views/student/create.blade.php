@extends('layouts.app')

@section('content')

    @include('layouts.jumbotron')

    @include('layouts.alert')

    <div class="container mb-5">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleNisn">NISN </label>
                        <input type="text" class="form-control" placeholder="Masukkan NISN  " name="nisn">
                    </div>
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
            </div>
        </div>
    </div>
@endsection
