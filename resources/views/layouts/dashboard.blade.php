<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Academic Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2><i class="fas fa-graduation-cap"></i> <span>Academic Admin</span></h2>
                <p>Management Portal</p>
            </div>

            <nav class="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route('panel.index') }}" class="{{ request()->routeIs('panel.index') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.teachers.index') }}" class="{{ request()->routeIs('panel.teachers.*') ? 'active' : '' }}">
                            <i class="fas fa-chalkboard-teacher"></i> <span>Manage Teachers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.staffs.index') }}" class="{{ request()->routeIs('panel.staffs.*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i> <span>Manage Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.contents.index') }}" class="{{ request()->routeIs('panel.content.*') ? 'active' : '' }}">
                            <i class="fas fa-file-alt"></i> <span>Manage Content</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.notices.index') }}" class="{{ request()->routeIs('panel.notices.*') ? 'active' : '' }}">
                            <i class="fas fa-bullhorn"></i> <span>Manage Notice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('panel.gallery-images.index') }}" class="{{ request()->routeIs('panel.gallery-images.*') ? 'active' : '' }}">
                            <i class="fas fa-images"></i> <span>Manage Gallery</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="{{ request()->routeIs('panel.others.*') ? 'active' : '' }}">
                            <i class="fas fa-cogs"></i> <span>Others</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navbar -->
            <header class="top-navbar">
                <div class="nav-left">
                    <button class="menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                </div>

                <div class="user-info">
                    <span>{{ Auth::user()->name ?? 'Admin User' }}</span>
                    <div class="user-avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </div>
        </main>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    @stack('scripts')
</body>
</html>
