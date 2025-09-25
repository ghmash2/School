@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="section-header">
    <h2>Dashboard Overview</h2>
    <div class="date-info">
        <span id="current-date">{{ \Carbon\Carbon::now()->format('l, F j, Y') }}</span>
    </div>
</div>

<div class="stats-container">
    {{-- <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <h3>{{ $teacherCount ?? 0 }}</h3>
        <p>Teachers</p>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-user-tie"></i>
        </div>
        <h3>{{ $staffCount ?? 0 }}</h3>
        <p>Staff Members</p>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-file-alt"></i>
        </div>
        <h3>{{ $contentCount ?? 0 }}</h3>
        <p>Content Pages</p>
    </div>
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-bullhorn"></i>
        </div>
        <h3>{{ $noticeCount ?? 0 }}</h3>
        <p>Active Notices</p>
    </div> --}}
</div>

<div class="dashboard-grid">
    {{-- <div class="card">
        <div class="card-header">
            <h3>Recent Activities</h3>
        </div>
        <div class="card-body">
            <ul class="activity-list">
                @foreach($recentActivities as $activity)
                <li class="activity-item">
                    <div><i class="fas fa-{{ $activity['icon'] }}" style="color: {{ $activity['color'] }};"></i> {{ $activity['description'] }}</div>
                    <div class="activity-time">{{ $activity['time'] }}</div>
                </li>
                @endforeach
            </ul>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header">
            <h3>Quick Actions</h3>
        </div>
        {{-- <div class="card-body">
            <div class="quick-actions">
                <a href="{{ route('panel.teachers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Teacher
                </a>
                <a href="{{ route('admin.notices.create') }}" class="btn btn-outline">
                    <i class="fas fa-bullhorn"></i> Create Notice
                </a>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline">
                    <i class="fas fa-images"></i> Upload to Gallery
                </a>
                <a href="{{ route('admin.content.create') }}" class="btn btn-outline">
                    <i class="fas fa-file-alt"></i> Add Content
                </a>
            </div>
        </div> --}}
    </div>
</div>
@endsection
