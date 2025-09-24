@extends('layouts.app')
@section('content')
<head>
    <title>ACPS School - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/employee_list_type.css') }}">
</head>
<body>
    <div class="page-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title"><i class="fas fa-chalkboard-teacher"></i> @yield('page-title')</h1>
            <p class="page-subtitle">@yield('page-subtitle')</p>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-options">@yield('filter')</div>
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search by name, dept. or ID...">
            </div>
        </div>

        <!-- Teachers Grid -->
        <div class="teachers-list">
            @yield('teachers-content')
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#"><i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <script src="{{ asset('js/employee_list.js') }}"></script>
</body>
@endsection
