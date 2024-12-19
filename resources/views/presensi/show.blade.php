@extends('layouts.app')

@section('content')
    @include('layouts.header')

    <div class="container my-5">
        @if (strpos(url()->current(), 'pdf') == false )
        <a href="{{ url('presensi/download/pdf')}}">DOWNLOAD PDF</a>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $data->name }}
                        </h3>

                        <div class="border-bottom my-3"></div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->nisn }}</td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            @if (in_array($user->id, $data->PresensiUser->pluck('user_id')->toArray()))
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
        </div>
    </div>
@endsection
