@extends('layouts.description_type_page')

@php
    $contentController = new \App\Http\Controllers\ContentController();
    $content = $contentController->view('ICT Club');
    $sliderImages = $content->content_images ? $content->content_images->all() : [];

@endphp
@section('title', 'Clubs')

@section('slider-content')
    @foreach($sliderImages as $index => $slide)
        <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ $slide['image'] }}');">
            <div class="slide-content">
                <h3 class="slide-title">{{ $slide['title'] }}</h3>
                <p class="slide-desc">{{ $slide['desc'] }}</p>
            </div>
        </div>
    @endforeach
@endsection

@section('headline', $content->title)

@section('description')
  {{ $content->content }}
@endsection

{{-- @section('stats')
    <div class="stat-item">
        <div class="stat-number">2,500+</div>
        <div class="stat-label">Students</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">150+</div>
        <div class="stat-label">Faculty Members</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">35+</div>
        <div class="stat-label">Years of Excellence</div>
    </div>
    <div class="stat-item">
        <div class="stat-number">98%</div>
        <div class="stat-label">Pass Rate</div>
    </div>
@endsection --}}
