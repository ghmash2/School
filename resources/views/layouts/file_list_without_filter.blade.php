@extends('layouts.app')
@section('content')

    <head>
        <title>ACPS School - @yield('title')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/files_list.css') }}">
    </head>

    <body>
        <div class="page-container">
            <!-- Page Header -->
            <div class="page-header">
                <h5 class="page-title"><i class="fas fa-file-alt"></i> @yield('page-title')</h5>
                {{-- <p class="page-subtitle">@yield('page-subtitle')</p> --}}
            </div>

            <!-- Filter Section -->
            <div class="filter-section">
                {{-- <div class="filter-options">
                <button class="filter-btn active">All Notices</button>
                <button class="filter-btn">For Students</button>
                <button class="filter-btn">For Parents</button>
                <button class="filter-btn">For Staff</button>
                <button class="filter-btn">Academic</button>
            </div> --}}
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search notices...">
                </div>
            </div>

            <!-- Notices List -->
            <div class="notices-list">
                <div class="table-header">
                    <div>Date</div>
                    <div>Notice Headline</div>
                    <div>Download</div>
                </div>

                @yield('notices-content')



                <!-- Pagination -->
                <div class="pagination">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/files_list.js') }}"></script>
    </body>
@endsection
