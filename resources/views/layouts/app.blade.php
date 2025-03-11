<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Tabler --}}
        <script src="{{ asset('js/tabler.min.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/tabler.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/tabler-marketing.min.css')}}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="body-marketing body-gradient">

        <header class="navbar navbar-expand-lg  py-3 ">
            <div class="container">
                <a href="/" wire:navigate class="navbar-brand navbar-brand-autodark">
                    Logo Anda
                </a>


                <div class="nav-item dropdown ms-4">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm"
                            style="background-image: url(https://ui-avatars.com/api/?name={{urlencode(Auth()->user()->name)}}&background=0054A6&color=fff)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{Auth()->user()->name}}</div>
                            <div class="mt-1 small text-secondary">{{Auth()->user()->email}}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{route('profile')}}" wire:navigate class="dropdown-item">Profile</a>


                        <livewire:layout.navigation />
                    </div>
                </div>

            </div>
        </header>

        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <div class="row flex-fill align-items-center">
                            <div class="col">
                                <ul class="navbar-nav">
                                    <li class="nav-item {{request()->routeIs('dashboard') ? 'active' : '' }} ">
                                        <a class="nav-link" href="{{route('dashboard')}}" wire:navigate>
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-1">
                                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"></path>
                                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Dashboard
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#" wire:navigate>
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Siswa
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item {{request()->routeIs('kelas') ? 'active' : '' }}">
                                        <a class="nav-link" href="{{route('kelas')}}" wire:navigate>
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-notes">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                                                    <path d="M9 7l6 0" />
                                                    <path d="M9 11l6 0" />
                                                    <path d="M9 15l4 0" />
                                                </svg>
                                            </span>
                                            <span class="nav-link-title">
                                                Kelas
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        @if (isset($judul))
        <div class="container-xl mt-4">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Page
                    </div>
                    <h2 class="page-title">
                        {{$judul}}
                    </h2>
                </div>
            </div>
        </div>
        @endif

        {{ $slot }}

    </body>

    {{-- <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
           

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
    </div>
    </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    </div>
    </body> --}}

</html>