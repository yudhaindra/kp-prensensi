@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    @include('layouts.header')

    <div class="container" style="margin-bottom: 150px;">
        <div class="row">

            <div class="col-md-3">
                <div class="store-article">
                    <h5>
                        Menu
                    </h5>
                    <div class="border-bottom my-2"></div>
                </div>
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" id="v-pills-home-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-home" aria-controls="v-pills-home"
                        aria-selected="true">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Presensi
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" id="v-pills-students-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-students" aria-controls="v-pills-students"
                        aria-selected="false">
                        <i class="fa-solid fa-gear me-2"></i>
                        Students
                    </button>
                    <a href="{{ route('teachers.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-chalkboard-teacher me-2"></i>
                        Teachers
                    </a>
                    <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-chalkboard-teacher me-2"></i>
                        Roles
                    </a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @include('dashboard.presensi')
                    </div>
                    <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab"
                        tabindex="0">
                        @include('dashboard.students')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
