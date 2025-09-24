@extends('layouts.file_list_without_filter')

@section('title', 'Notices & Circulars')

@section('page-title', 'Results')
{{-- @section('page-subtitle', 'Important notices, circulars, and documents for students, parents, and staff') --}}

@section('notices-content')
    <!-- Notice Item 1 -->
    <div class="notice-item">
        <div class="notice-date">
            <i class="far fa-calendar"></i> October 20, 2023
        </div>
        <div class="notice-headline">
            <a href="#">Admission Notice for Class XI - Academic Year 2024-25</a>
            <div class="file-info">
                <i class="far fa-file-pdf"></i> PDF, 245 KB
            </div>
        </div>
        <div class="notice-actions">
            <a href="{{ asset('notices/admission-notice-2024.pdf') }}" class="download-btn" title="Download Notice">
                <i class="fas fa-download"></i>
            </a>
        </div>
    </div>

    <!-- Notice Item 2 -->
    <div class="notice-item">
        <div class="notice-date">
            <i class="far fa-calendar"></i> October 18, 2023
        </div>
        <div class="notice-headline">
            <a href="#">Annual Sports Day Schedule and Guidelines</a>
            <span class="priority-high"><i class="fas fa-exclamation-circle"></i> Important</span>
            <div class="file-info">
                <i class="far fa-file-word"></i> DOCX, 187 KB
            </div>
        </div>
        <div class="notice-actions">
            <a href="{{ asset('notices/sports-day-schedule.docx') }}" class="download-btn" title="Download Notice">
                <i class="fas fa-download"></i>
            </a>
        </div>
    </div>

    <!-- Additional notice items would be here -->
@endsection
