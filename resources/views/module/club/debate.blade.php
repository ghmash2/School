@extends('layouts.description_type_page')

@php
    $contentController = new \App\Http\Controllers\ContentController();
    $content = $contentController->view('Debate Club');
    $sliderImages = $content->content_images ? $content->content_images->all() : [];

@endphp
@section('title', 'Clubs')

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
