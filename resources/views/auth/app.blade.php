<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="shortcut icon" type="image/jpg" href="{{asset('burger.png')}}"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body >
<div id="admin">
    <div class="container-fluid p-0 m-0" style="font-family: Nunito">
        <div class="row p-0 m-0">
            @if(\Illuminate\Support\Facades\Auth::user())
                <div class="col-auto col-xl-2 col-md-3 p-0">
                    @include('auth.shared.sidenav')
                </div>
            @endif
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>

</div>

</body>
</html>
