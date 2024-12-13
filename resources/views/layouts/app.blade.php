<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.title', 'Home') }} - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/vendor/fontawesome/css/all.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css') }}/style.css?{{ rand(1, 100) }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    @stack('head')
</head>

<body>
    @yield('content')

    <!-- Footer -->
    <footer class="footer bg-dark text-white">
        <div class="container py-5">
            <div class="row">
                <!-- Logo dan Informasi -->
                <div class="col-md-4">
                    <img src="{{ asset('images/teachers/footer.png') }}" alt="Logo SMA Immanuel Kalasan" class="mb-3" style="width: 300px;">
                    <h5>Sukses Meraih Masa Depan</h5>
                </div>
                <div class="col-md-8 text-end">
                    <address>
                        Jalan Solo KM 15<br>
                        Gampar, Tamanmartani, Kalasan, Sleman,Yogyakarta<br>
                        Telp : 0274 4469287<br>
                        Email : smaimmanuelkalasan@gmail.com
                    </address>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    @stack('body')
</body>

</html>
