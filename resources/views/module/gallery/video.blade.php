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
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
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

        <!-- Video 2 -->
        <div class="gallery-item" data-category="academic" data-title="Science Exhibition Tour">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Science Exhibition">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">8:15</div>
            </div>
            <div class="media-caption">
                <h3>Science Exhibition Tour</h3>
                <p>A guided tour of student projects at the annual science exhibition.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> September 22, 2023
                </div>
            </div>
        </div>

        <!-- Video 3 -->
        <div class="gallery-item" data-category="performances" data-title="Music Concert Highlights">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Music Concert">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">12:40</div>
            </div>
            <div class="media-caption">
                <h3>Music Concert Highlights</h3>
                <p>Highlights from the school's annual music concert featuring various performances.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> September 5, 2023
                </div>
            </div>
        </div>

        <!-- Video 4 -->
        <div class="gallery-item" data-category="events" data-title="Graduation Ceremony 2023">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Graduation">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">22:30</div>
            </div>
            <div class="media-caption">
                <h3>Graduation Ceremony 2023</h3>
                <p>Full coverage of the graduation ceremony for the class of 2023.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> June 15, 2023
                </div>
            </div>
        </div>

        <!-- Video 5 -->
        <div class="gallery-item" data-category="interviews" data-title="Principal's Annual Address">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Principal's Address">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">15:20</div>
            </div>
            <div class="media-caption">
                <h3>Principal's Annual Address</h3>
                <p>Principal's address to students and parents about the academic year achievements.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> May 30, 2023
                </div>
            </div>
        </div>

        <!-- Video 6 -->
        <div class="gallery-item" data-category="academic" data-title="Debate Competition Finals">
            <div class="media-container">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Debate Competition">
                    <div class="video-play-btn">
                        <i class="fas fa-play"></i>
                    </div>
                </div>
                <span class="media-type">Video</span>
                <div class="video-duration">18:45</div>
            </div>
            <div class="media-caption">
                <h3>Debate Competition Finals</h3>
                <p>Final round of the inter-class debate competition on environmental issues.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> April 18, 2023
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
