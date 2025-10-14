@extends('layouts.description_type_page')

@section('title', 'About Us')

@php
    $contentController = new \App\Http\Controllers\ContentController();
    $content = $contentController->view('Quiz Club');
    $sliderImages = $content->content_images ? $content->content_images->all() : [];

@endphp
@section('slider-content')
    @foreach($sliderImages as $index => $slide)
        <div class="slide {{ $index === 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
            {{-- <div class="slide-content">
                <h3 class="slide-title">{{ $slide['title'] }}</h3>
                <p class="slide-desc">{{ $slide['desc'] }}</p>
            </div> --}}
        </div>
    @endforeach
@endsection

@section('headline', $content->title)

@section('description')
{{ $content->content }}
@endsection
