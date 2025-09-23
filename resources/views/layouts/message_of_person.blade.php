@extends('layouts.app')
@section('content')

    <head>
        <title>ACPS School - @yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/message_of_person.css') }}">
    </head>

    <body>
        <div class="page-container">
            <!-- Page Content -->
            <div class="page-content">
                <h1 class="page-headline">@yield('headline')</h1>
                <div class="image-slider">@yield('image')</div>
                <div class="page-description">
                    @yield('description')
                </div>
            </div>


            <!-- Stats Section -->
            @hasSection('stats')
                <div class="stats-section">
                    <div class="stats-container">
                        @yield('stats')
                    </div>
                </div>
            @endif
        </div>

        {{-- <script src="{{ asset('js/slider.js') }}"></script> --}}
    </body>
@endsection
