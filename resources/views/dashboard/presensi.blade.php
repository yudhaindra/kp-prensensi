@can('create presensi')
    <div class="mb-3">
        <h5>
            Buat Presensi
        </h5>
        <div class="border-bottom my-2"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('presensi.create') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="pertemuan" class="form-label">Pertemuan Ke</label>
                                <input type="text" class="form-control" id="pertemuan" name="pertemuan"
                                    value="{{ old('pertemuan') }}" required autocomplete="pertemuan">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autocomplete="name">
                            </div>

                            <div class="mb-3">
                                <label for="expired" class="form-label">Expired</label>
                                <input type="datetime-local" class="form-control" id="expired" name="expired"
                                    value="{{ old('expired') }}" required autocomplete="expired">
                            </div>

                            <div class="d-flex flex-row-reverse">
                                <button id="submit" class="btn btn-success btn-sm" type="submit">
                                    Tambah
                                    <i class="fa-solid fa-file-user ms-2"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcan

<div>
    
    <div>
        <h5>
            Data Presensi
        </h5>
        <div class="border-bottom my-2"></div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <table class="table table-striped w-100">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pertemuan Ke</th>
                        <th scope="col">Nama</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPresensi as $presensi)
                        @php
                            $now = Carbon\Carbon::now();
                            $created = Carbon\Carbon::create($presensi->created_at);
                            $expired = Carbon\Carbon::create($presensi->expired_at);
                        @endphp

                        <tr>
                            <td>
                                {{ $created->isoFormat('DD-MM-YYYY') }}
                                <br>
                                {{ $created->isoFormat('HH:mm:ss') }}
                            </td>
                            <td>{{ $presensi->pertemuan }}</td>
                            <td>
                                <a href="{{ route('presensi.show', ['uuid' => $presensi->uuid]) }}">{{ $presensi->name }}</a>
                            </td>
                            <td class="text-center">
                                @if (!$now->greaterThan($expired))
                                    @if (!$presensi->users->isNotEmpty())
                                        <form method="post" action="{{ route('presensi.store') }}">
                                            @csrf
                                            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                            <input type="text" name="presensi_id" value="{{ $presensi->id }}"
                                                hidden>

                                            <button type="submit" class="btn btn-primary btn-sm">Presensi</button>
                                        </form>
                                    @endif
                                @endif
                                <br>
                                @if ($presensi->users->isNotEmpty())
                                    <p class="fw-bold text-primary">H</p>
                                @else
                                    <p class="fw-bold text-danger">A</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
