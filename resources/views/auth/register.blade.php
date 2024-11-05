<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <x-alert />

                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nisn" class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    value="{{ old('nisn') }}" required autocomplete="nisn">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autocomplete="name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email">
                            </div>

                            <div class="mb-3">
                                <label for="nohp" class="form-label">No Handphone</label>
                                <input type="text" class="form-control" id="nohp" name="nohp" value="{{ old('nohp') }}" required
                                    autocomplete="nohp">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>

                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                                autocomplete="alamat">
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Password</label>

                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>

                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row-reverse">
                                <div class="p-2">
                                    <button id="submit" class="btn btn-danger" type="submit">
                                        Daftar
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
</x-app>
