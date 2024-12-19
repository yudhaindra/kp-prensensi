<div class="card">
    <div class="card-body">

        <div class="row">
            <div class="col-md-4">
                <img src="{{ $user->getProfile() }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-8">
                {{ $user->name }}
                <br>
                {{ \Carbon\Carbon::parse($user->dob)->age }} Tahun
            </div>
        </div>

        <div class="my-3">
            <form method="post" action="{{ route('account.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="profile" class="form-label">Profile</label>
                    <input class="form-control" type="file" id="profile" name="profile" required>
                </div>

                <div class="d-flex flex-row-reverse">
                    <div class="p-2">
                        <button id="submit" class="btn btn-danger" type="submit">
                            Update
                            <i class="fa-solid fa-file-user ms-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <ul class="list-group mt-3">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Name:
                <span>
                    {{ $user->name }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Email:
                <span>
                    {{ $user->email }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                No. Handphone:
                <span>
                    {{ $user->nomor_handphone }}
                </span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Alamat:
                <span>
                    {{ $user->alamat }}
                </span>
            </li>
        </ul>

    </div>
</div>
