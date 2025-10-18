@extends('layouts.emoloyee_list_type')
@php
    $staffController = new \App\Http\Controllers\StaffController();
    $staffs = $staffController->view();
@endphp
@section('title', 'Staff Directory')

@section('page-title', 'Staff Directory')
{{-- @section('page-subtitle', 'Meet our dedicated teaching staff and faculty members') --}}

@section('teachers-content')
    <div class="teachers-grid">
        @foreach ($staffs as $staff)
            <div class="teacher-card">
                <div class="teacher-header">
                    <img src={{ asset('storage/' . $staff->image) }} alt="" class="teacher-image">
                    <div class="teacher-basic-info">
                        <h3>{{ $staff->name }}</h3>
                        <div class="teacher-designation">{{ $staff->designation }}</div>
                        <span class="teacher-subject">{{ $staff->subject }}</span>
                    </div>
                </div>
                <div class="teacher-details">
                    <div class="detail-row">
                        <div class="detail-label"><i class="far fa-calendar-alt"></i> Joining Date</div>
                        <div class="detail-value">{{ $staff->join_date }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="far fa-envelope"></i> Email</div>
                        <div class="detail-value">{{ $staff->email }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="fas fa-phone"></i> Contact</div>
                        <div class="detail-value">{{ $staff->phone }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label"><i class="fas fa-id-card"></i> Staff ID</div>
                        <div class="detail-value"><span class="teacher-id">{{ $staff->id }}</span></div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
