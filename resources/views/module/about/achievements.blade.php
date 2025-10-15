@extends('layouts.news_type_page')
@php
    $contentController = new \App\Http\Controllers\ContentController();
    $contents = $contentController->viewAll('Achievements');
@endphp
@section('title', 'Achievements')

@section('page-title', 'Achievements')
{{-- @section('page-subtitle', 'Stay updated with the latest news and achievements from ACPS') --}}

@section('news-items')

    @foreach ($contents as $content)
        @php
            $image = $content->content_images->first();
        @endphp
        <div class="news-item">
            <div class="news-image">

                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $content->headline }}">

            </div>
            <div class="news-content">
                <div class="news-meta">
                    <div class="news-date"><i class="far fa-calendar"></i> {{ $content->created_at }}</div>
                    {{-- <div class="news-category">Achievement</div> --}}
                </div>
                <h2 class="news-headline">{{ $content->headline }}</h2>
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
    <div class="full-news" id="full-news-{{ $content->id }}">
        <div class="full-news-content">
            <div class="full-news-header">
                <div>
                    <h2 class="full-news-title">{{ $content->headline }}</h2>
                    <div class="news-meta">
                        <div class="news-date"><i class="far fa-calendar"></i> {{ $content->created_at }}</div>
                    </div>
                </div>
            </div>

            {{-- Display all images for this content --}}
            <div class="full-news-image">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $content->headline }}" class="full-news-image">
                @endforeach
            </div>

            <div class="full-news-text">{!! nl2br(e($content->content)) !!} </div>
            <a href="#" class="back-to-list"><i class="fas fa-arrow-left"></i> Back to News List</a>
        </div>
    </div>
    @endforeach
@endsection
