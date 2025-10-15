@extends('layouts.description_type_page')

@section('title', 'About Us')

@php
    $contentController = new \App\Http\Controllers\ContentController();
    $content = $contentController->view('Quiz Club');
    $sliderImages = $content->content_images ? $content->content_images->all() : [];

@endphp
@section('slider-content')
    @foreach ($sliderImages as $index => $slide)
        <div class="scroll-image-item">
            <img src="{{ asset('storage/' . $slide->image) }}" alt="Image {{ $index + 1 }}" class="scroll-image">
        </div>
    @endforeach
@endsection

@section('headline', $content->title)

@section('description')
{!! nl2br(e($content->content)) !!}
@endsection
