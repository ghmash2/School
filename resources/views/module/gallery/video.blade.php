@extends('layouts.gallery')

@section('title', 'Video Gallery')

@section('page-title', 'Video Gallery')
@section('page-subtitle', 'Watch highlights from school events, performances, and activities')
@section('media-type', 'videos')

@section('video-active', 'active')

@section('filter-options')
    <button class="filter-btn active" data-filter="all">All Videos</button>
    <button class="filter-btn" data-filter="events">Events</button>
    <button class="filter-btn" data-filter="sports">Sports</button>
    <button class="filter-btn" data-filter="academic">Academic</button>
    <button class="filter-btn" data-filter="performances">Performances</button>
    <button class="filter-btn" data-filter="interviews">Interviews</button>
@endsection

@section('gallery-content')
    <div class="gallery-grid">
        <!-- Video 1 -->
        <div class="gallery-item" data-category="sports" data-title="Annual Sports Day 2023">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src=""
                         alt="Sports Day">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">5:24</div>
            </div>
            <div class="media-caption">
                <h3>Annual Sports Day 2023</h3>
                <p>Highlights from our annual sports day featuring various track and field events.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> October 10, 2023
                </div>
            </div>
        </div>

    </div>
@endsection

@section('modal-content')
    <div class="video-player">
        <iframe id="videoFrame" width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>
    </div>
@endsection
