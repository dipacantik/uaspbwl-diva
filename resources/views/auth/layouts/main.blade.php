<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/pln.jpg') }}">
    <title>{{ $title }}</title>

    {{-- my style --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sign-in.css') }}">
</head>
<body class="bg-primary overflow-hidden">
    <div class="row justify-content-center h-75">
        <div class="col-lg-3 mt-auto">
            <main class="form-signin">
                @yield('main-body')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>