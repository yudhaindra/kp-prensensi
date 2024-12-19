@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    @include('layouts.header')

    <div class="container my-5">
        <div class="row">

            <div class="col-md-4">
                <div class="list-group">
                    <button type="button" class="list-group-item list-group-item-action active" id="v-pills-home-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-home" aria-controls="v-pills-home"
                        aria-selected="true">
                        <i class="fa-solid fa-circle-info me-2"></i>
                        Account Info
                    </button>
                    <button type="button" class="list-group-item list-group-item-action" id="v-pills-students-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-students" aria-controls="v-pills-students"
                        aria-selected="false">
                        <i class="fa-solid fa-gear me-2"></i>
                        Students
                    </button>
                </div>
            </div>

            <div class="col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @include('account.info')
                    </div>
                    <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab"
                        tabindex="0">
                        @include('account.students')
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
