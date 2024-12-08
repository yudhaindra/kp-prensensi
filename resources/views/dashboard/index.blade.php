<x-app>

    @include('layouts.jumbotron')

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
                        Account Info
                    </button>
                </div>
            </div>
            <div class="col-md-9">

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @include('dashboard.presensi')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app>
