<div>

    <h5>
        Data Teachers
    </h5>

    <div class="border-bottom my-2"></div>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Umur</th>
                <th scope="col">Alamat</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->nisn }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($teacher->dob)->age }}</td>
                    <td>{{ $teacher->alamat }}</td>
                    <td class="text-center">
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-warning btn-sm" type="button"
                                href="{{ route('teachers.edit', ['teacher' => $teacher->id]) }}">Lihat</a>

                            @can('delete teacher')
                                <button class="btn btn-danger btn-sm" type="button">Delete</button>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
