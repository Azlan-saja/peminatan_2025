<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="{{ asset('js/tabler.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/tabler.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/tabler-marketing.min.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="body-marketing body-gradient">

        <header class="navbar navbar-expand-lg  py-3">
            <div class="container">
                <a href="/" wire:navigate class="navbar-brand navbar-brand-autodark">
                    Logo Anda
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <nav class="navbar-nav ms-auto">

                        @auth
                        <div class="nav-item ms-4">
                            <a class="btn btn-primary" href="{{route('dashboard')}}" wire:navigate><span
                                    class="nav-link-title">Dashboard</span></a>
                        </div>

                        @else
                        <div class="nav-item ">
                            <a class="nav-link active" href="/" wire:navigate><span
                                    class="nav-link-title">Home</span></a>
                        </div>
                        @if (Route::has('register'))
                        <div class="nav-item">
                            <a class="nav-link" href="{{route('register')}}" wire:navigate><span
                                    class="nav-link-title">Register</span></a>
                        </div>
                        @endif
                        <div class="nav-item ms-4">
                            <a href="{{route('login')}}" class="btn btn-primary" wire:navigate>Login</a>
                        </div>

                        @endauth

                    </nav>
                </div>
            </div>
        </header>


        {{ $slot }}

    </body>

</html>