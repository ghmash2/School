@extends('layouts.file_list_without_filter')
@php
    $noticeController = new \App\Http\Controllers\NoticeController();
    $notices = $noticeController->view('Digital-Class-Seven');
    //$files = $notices->notice_files ? $notices->notice_files->all() : [];
@endphp
@section('title', 'Digital')

@section('page-title', $notice->title)
{{-- @section('page-subtitle', 'Important notices, circulars, and documents for students, parents, and staff') --}}

@section('notices-content')
    <!-- Notice Items -->
    @foreach ($notices as $notice)
        @php
            $files = $notice->notice_files ? $notice->notice_files->all() : [];
        @endphp
        <div class="notice-item">
            <div class="notice-date">
                <i class="far fa-calendar"></i> {{ $notice->published_date }}
            </div>
            <div class="notice-headline">
                <a href="#">{{ $notice->title }}</a>
                <div class="file-info">
                    <i class="far fa-file-pdf"></i>{{ $files->count() }} Files
                </div>
            </div>
            <div class="notice-actions">
                <a href="{{ $files }}" class="download-btn" title="Download Notice">
                    <i class="fas fa-download"></i>
                </a>
            </div>
        </div>
    @endforeach

@endsection
