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
                        <form method="post" action="{{ route('dashboard.presensi.create') }}">
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
            <table id="presensi-list" class="table table-striped w-100"></table>
        </div>
    </div>

</div>

@push('body')
    <script>
        $(document).ready(function() {
            $("#presensi-list").DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                pageLength: 10,
                ajax: "{{ route('api.presensi') }}",
                columns: [{
                    "title": "Tanggal",
                    "data": "created_at",
                    "searchable": false,
                    "orderable": true,
                    "render": function(data, row, full) {
                        let date = new Date(data);

                        return `${date.toLocaleString('en-GB', { timeZone: 'UTC' })}`;
                    },
                }, {
                    "title": "Pertemuan Ke",
                    "data": "pertemuan",
                    "className": "text-center",
                    "searchable": false,
                    "orderable": true,
                }, {
                    "title": "Name",
                    "data": "name",
                    "searchable": true,
                    "orderable": false,
                }]
            });
        });
    </script>
@endpush
