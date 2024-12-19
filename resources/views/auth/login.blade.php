@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    @include('layouts.header')

    <div class="container my-5">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @include('layouts.alert')

                        <h5 class="card-title">Login</h5>

                        <div class="border-bottom my-3"></div>
                        <form method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    value="{{ old('nisn') }}" required autocomplete="nisn">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password') }}" required autocomplete="password">
                            </div>

                            <div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button id="submit" class="btn btn-danger" type="submit">
                                        MASUK
                                        <i class="fa-solid fa-file-user ms-2"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
