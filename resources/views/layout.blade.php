<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('styles')
</head>

<body>
    <x-navbar></x-navbar>

    <div style="border:2px solid black; margin-top:100px" class="container  py-5">
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @yield('scripts')
</body>

</html>
