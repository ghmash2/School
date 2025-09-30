@extends('layouts.news_type_page')
@php
    $contentController = new \App\Http\Controllers\ContentController();
    $contents = $contentController->viewAll('News & Events');
    //$sliderImages = $content->content_images ? $content->content_images->all() : [];
@endphp
@section('title', 'News & Events')

@section('page-title', 'News & Events')
{{-- @section('page-subtitle', 'Stay updated with the latest news and achievements from ACPS') --}}

@section('news-items')

    @foreach ($contents as $content)
        @php
            $images = $content->content_images ? $content->content_images->all() : [];
        @endphp
        <div class="news-item">
            <div class="news-image">
                @foreach ($images as $image)
                    <img src="{{ $image }}">
                @endforeach
            </div>
            <div class="news-content">
                <div class="news-meta">
                    <div class="news-date"><i class="far fa-calendar"></i> {{ $content->published_date }}</div>
                    {{-- <div class="news-category">Achievement</div> --}}
                </div>
                <h2 class="news-headline">{{ $content->title }}</h2>
                {{-- <p class="news-excerpt">Bawany Government  Adarsha Biddyalaya has been honored with the National Education Award 2023 for outstanding academic performance and holistic development of students.</p> --}}
                <a href="#full-news-{{ $content->id }}" class="see-all-link" data-news="{{ $content->id }}">Read Full Story <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    @endforeach

@endsection

@section('full-news')
    @foreach ($contents as $content)
        @php
            $images = $content->content_images ? $content->content_images->all() : [];
        @endphp
    <div class="full-news" id="full-news-1">
        <div class="full-news-content">
            <div class="full-news-header">
                <div>
                    <h2 class="full-news-title">{{ $content->title }}</h2>
                    <div class="news-meta">
                        <div class="news-date"><i class="far fa-calendar"></i> {{ $content->published_date }}</div>
                    </div>
                </div>
            </div>
            <img src="{{ $image }}" alt="" class="full-news-image">
            <div class="full-news-text">{{ $content->content }} </div>
            <a href="#" class="back-to-list"><i class="fas fa-arrow-left"></i> Back to News List</a>
        </div>
    </div>
    @endforeach


@endsection
