@extends('layouts.gallery')

@section('title', 'Image Gallery')

@section('page-title', 'Image Gallery')
@section('page-subtitle', 'Explore our collection of school events and activities through photos')
@section('media-type', 'images')

@section('image-active', 'active')

@section('filter-options')
    <button class="filter-btn active" data-filter="all">All Images</button>
    <button class="filter-btn" data-filter="event">Events</button>
    <button class="filter-btn" data-filter="sport">Sports</button>
    <button class="filter-btn" data-filter="academic">Academic</button>
    <button class="filter-btn" data-filter="student">Students</button>
    <button class="filter-btn" data-filter="campus">Campus</button>
@endsection

@php
    $imageController = new \App\Http\Controllers\GalleryImageController();
    $images = $imageController->getAllImages();
@endphp

@section('gallery-content')
    <div class="gallery-grid">
        <!-- Image 1 -->
         @foreach ($images as $image)
        <div class="gallery-item" data-category="{{ $image->tag }}" data-title="{{ $image->title }}">
            <div class="media-container">
                <img src="{{ asset('storage/' . $image->image)}}"
                     alt="Annual Science Fair"
                     data-fullsize="{{ asset('storage/' . $image->image) }}">
                {{-- <span class="media-type">Image</span> --}}
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>{{ $image->title }}</h3>
                <p>{{ $image->description }}</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> {{ $image->created_at }}
                </div>
            </div>
        </div>
        @endforeach
@endsection

@section('modal-content')
    <img id="modalImage" src="" alt="">
@endsection
