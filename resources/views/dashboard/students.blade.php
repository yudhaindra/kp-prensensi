<div>

    <div>
        <h5>
            Data Students
        </h5>
        <div class="border-bottom my-2"></div>
    </div>

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
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->nisn }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($student->dob)->age }}</td>
                    <td>{{ $student->alamat }}</td>
                    <td class="text-center">
                        <div class="d-grid gap-2 d-md-block">
                            <a class="btn btn-warning btn-sm" type="button"
                                href="{{ route('students.edit', ['student' => $student->id]) }}">Edit</a>
                            <button class="btn btn-danger btn-sm" type="button">Delete</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
