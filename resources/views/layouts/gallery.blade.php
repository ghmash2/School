@extends('layouts.app')
@section('content')
<head>

    <title>ACPS School - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
</head>
<body>
    <div class="page-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title"><i class="fas fa-images"></i> @yield('page-title')</h1>
        </div>

        {{-- <!-- Gallery Navigation -->
        <div class="gallery-nav">
            <a href="{{ route('image.gallery') }}" class="nav-btn @yield('image-active')">
                <i class="fas fa-image"></i> Image Gallery
            </a>
            <a href="{{ route('video.gallery') }}" class="nav-btn @yield('video-active')">
                <i class="fas fa-video"></i> Video Gallery
            </a>
        </div> --}}

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-options">
                @yield('filter-options')
            </div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search @yield('media-type')..." id="searchInput">
            </div>
        </div>

        <!-- Gallery Content -->
        <div class="gallery-container">
            @yield('gallery-content')
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <!-- Modal for Lightbox -->
    <div id="mediaModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            @yield('modal-content')
        </div>
        <div id="modalCaption" class="modal-caption"></div>
    </div>

    <script src="{{ asset('js/gallery.js') }}"></script>
</body>
@endsection
