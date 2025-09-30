@extends('layouts.emoloyee_list_type')
@php
    $teacherController = new \App\Http\Controllers\TeacherController();
    $teachers = $teacherController->view();
@endphp

@section('title', 'Faculty Directory')

@section('page-title', 'Faculty Directory')
{{-- @section('page-subtitle', 'Meet our dedicated teaching staff and faculty members') --}}
@section('filter')
    <button class="filter-btn active">All Faculty</button>
    <button class="filter-btn">Science Department</button>
    <button class="filter-btn">Arts Department</button>
    <button class="filter-btn">Commerce Department</button>
    {{-- <button class="filter-btn">Senior Teachers</button> --}}
@endsection

@section('teachers-content')
    <div class="teachers-grid">
        @foreach ($teachers as $teacher)
            <div class="teacher-card">
                <div class="teacher-header">
                    <img src="{{ $teacher->image }}" alt="Dr. Sarah Johnson" class="teacher-image">
                    <div class="teacher-basic-info">
                        <h3>{{ $teacher->name }}</h3>
                        <div class="teacher-designation">{{ $teacher->designation }}</div>
                        <span class="teacher-subject">{{ $teacher->subject }}</span>
                    </div>
                </div>
                <div class="teacher-details">
                    <div class="detail-row">
                        <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                        <div class="detail-value">{{ $teacher->joining_date }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                        <div class="detail-value">{{ $teacher->email }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                        <div class="detail-value">{{ $teacher->contact }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="fas fa-id-card"></i> Teacher ID</div>
                        <div class="detail-value"><span class="teacher-id">{{ $teacher->id }}</span></div>
                    </div>
                </div>
        @endforeach
    </div>

@endsection
