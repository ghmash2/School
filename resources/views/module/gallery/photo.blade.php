@extends('layouts.gallery')

@section('title', 'Image Gallery')

@section('page-title', 'Image Gallery')
@section('page-subtitle', 'Explore our collection of school events and activities through photos')
@section('media-type', 'images')

@section('image-active', 'active')

@section('filter-options')
    <button class="filter-btn active" data-filter="all">All Images</button>
    <button class="filter-btn" data-filter="events">Events</button>
    <button class="filter-btn" data-filter="sports">Sports</button>
    <button class="filter-btn" data-filter="academic">Academic</button>
    <button class="filter-btn" data-filter="students">Students</button>
    <button class="filter-btn" data-filter="campus">Campus</button>
@endsection

@section('gallery-content')
    <div class="gallery-grid">
        <!-- Image 1 -->
        <div class="gallery-item" data-category="events" data-title="Annual Science Fair 2023">
            <div class="media-container">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                     alt="Annual Science Fair"
                     data-fullsize="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                <span class="media-type">Image</span>
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>Annual Science Fair 2023</h3>
                <p>Students showcasing their innovative science projects at the annual science fair held in the main auditorium.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> October 15, 2023
                </div>
            </div>
        </div>

        <!-- Image 2 -->
        <div class="gallery-item" data-category="academic" data-title="Library Reading Session">
            <div class="media-container">
                <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                     alt="Library Reading Session"
                     data-fullsize="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                <span class="media-type">Image</span>
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>Library Reading Session</h3>
                <p>Students engaged in a guided reading session at our newly renovated library.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> September 28, 2023
                </div>
            </div>
        </div>

        <!-- Image 3 -->

        <!-- Image 4 -->
        <div class="gallery-item" data-category="events" data-title="Annual Day Celebration">
            <div class="media-container">
                <img src="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                     alt="Annual Day Celebration"
                     data-fullsize="https://images.unsplash.com/photo-1541336032412-2048a678540d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                <span class="media-type">Image</span>
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>Annual Day Celebration</h3>
                <p>Colorful cultural performances during the school's annual day celebration.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> August 25, 2023
                </div>
            </div>
        </div>

        <!-- Image 5 -->
        <div class="gallery-item" data-category="academic" data-title="Science Lab Experiments">
            <div class="media-container">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                     alt="Science Lab"
                     data-fullsize="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                <span class="media-type">Image</span>
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>Science Lab Experiments</h3>
                <p>Students conducting chemistry experiments in our well-equipped science laboratory.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> August 12, 2023
                </div>
            </div>
        </div>

        <!-- Image 6 -->
        <div class="gallery-item" data-category="campus" data-title="New Campus Building">
            <div class="media-container">
                <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                     alt="Campus Building"
                     data-fullsize="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80">
                <span class="media-type">Image</span>
                <div class="media-overlay">
                    <i class="fas fa-expand"></i>
                </div>
            </div>
            <div class="media-caption">
                <h3>New Campus Building</h3>
                <p>Our newly constructed academic block with modern facilities and classrooms.</p>
                <div class="media-date">
                    <i class="far fa-calendar"></i> July 30, 2023
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal-content')
    <img id="modalImage" src="" alt="">
@endsection
