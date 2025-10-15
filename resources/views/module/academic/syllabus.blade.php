@extends('layouts.file_list_without_filter')
@php
    $noticeController = new \App\Http\Controllers\NoticeController();
    $notices = $noticeController->view('Syllabus and Booklist');
    //$files = $notices->notice_files ? $notices->notice_files->all() : [];
@endphp
@section('title', 'Academic')

@section('page-title',  'Syllabus and Booklist')
{{-- @section('page-subtitle', 'Important notices, circulars, and documents for students, parents, and staff') --}}

@section('notices-content')
    <!-- Notice Items -->
    @foreach ($notices as $notice)
        @php
            $files = $notice->notice_files ? $notice->notice_files->all() : [];
        @endphp
        <div class="notice-item">
            <div class="notice-date">
                <i class="far fa-calendar"></i> {{ \Carbon\Carbon::parse($notice->published_date)->format('M d, Y') }}
            </div>
            <div class="notice-headline">
                <h3>{{ $notice->title }}</h3>
                @if ($notice->description)
                    <p class="notice-description">{{ Str::limit($notice->description, 150) }}</p>
                @endif
                <div class="file-info">
                    <i class="far fa-file"></i> {{ count($files) }} File(s)
                </div>
            </div>
            <div class="notice-actions">
                @if (count($files) > 0)
                    @foreach ($files as $file)
                        @php
                            $fileExtension = pathinfo($file->file, PATHINFO_EXTENSION);
                            $fileName = basename($file->file);
                            $icon = 'far fa-file';

                            if (in_array($fileExtension, ['pdf'])) {
                                $icon = 'far fa-file-pdf text-danger';
                            } elseif (in_array($fileExtension, ['doc', 'docx'])) {
                                $icon = 'far fa-file-word text-primary';
                            } elseif (in_array($fileExtension, ['xls', 'xlsx'])) {
                                $icon = 'far fa-file-excel text-success';
                            } elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                $icon = 'far fa-file-image text-info';
                            }
                        @endphp

                        <button type="button" class="" title="Download {{ $fileName }}"
                            onclick="window.location.href='{{ route('download.notice', $file->id) }}'">
                            <i class="{{ $icon }}"></i>
                        </button>
                    @endforeach
                @else
                    <span class="no-files">No files attached</span>
                @endif
            </div>
        </div>
    @endforeach

    @if (count($notices) === 0)
        <div class="no-notices">
            <p>No files found.</p>
        </div>
    @endif
@endsection
