@extends('layouts.app')
@section('content')
<head>
    <title>ACPS School - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/description_type_page.css') }}">
</head>
<body>
    <div class="page-container">
        <!-- Image Slider -->
        <div class="image-slider">
            @yield('slider-content')

            <div class="slider-arrows">
                <div class="arrow prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="arrow next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>

            {{-- <div class="slider-nav">
                @if ($content != null && $sliderImages != null)
                @for($i = 0; $i < count($sliderImages); $i++)
                    <div class="slider-dot {{ $i === 0 ? 'active' : '' }}"></div>
                @endfor
                @endif
            </div> --}}
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <h1 class="page-headline">@yield('headline')</h1>

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

    <script src="{{ asset('js/slider.js') }}"></script>
</body>

@endsection
