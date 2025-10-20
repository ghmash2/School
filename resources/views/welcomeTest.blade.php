@extends('layouts.app')

<head>
    <title>ACPS School - Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
@php
    $contentController = new \App\Http\Controllers\ContentController();
    $content = $contentController->view('At a Glance');
    $noticeController = new \App\Http\Controllers\NoticeController();
    $image = $content->content_images ? $content->content_images->first()->image : '';
@endphp
@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <!-- Notice Marquee Section -->
        <div class="top-notice-container">
            <div class="top-notice-label">
                <i class="fas fa-bullhorn"></i> LATEST NOTICES
            </div>
            <div class="top-notice-box">
                <div class="top-notice-content" id="topNoticeContent">
                    <!-- Top Notice items will be dynamically added here -->
                </div>
            </div>
        </div>

        <!-- Hero Slider -->
        <section class="hero-slider" id="heroSlider">
            <!-- Slides will be dynamically added here -->
            <div class="slide" style="background-image: url('{{ asset('resources/images/test5.png') }}');">
                <div class="slide-content">
                    <h2>Academic Excellence</h2>
                    <p>Our students consistently achieve outstanding results in national examinations.</p>
                    <a href="#" class="btn">View Results</a>
                </div>
            </div>
            <div class="slide" style="background-image: url('{{ asset('resources/images/school_buiding.avif') }}');">
                <div class="slide-content">
                    <h2>Extracurricular Activities</h2>
                    <p>We believe in holistic development through sports, arts, and cultural activities.</p>
                    <a href="#" class="btn">Our Programs</a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section" id="aboutSection">
            <div class="about-container">
                <div class="about-image">
                    <img src="{{ asset('storage/' . $image) }}" alt="ACPS School Building" id="aboutImage">
                </div>
                <div class="about-content">
                    <h2 id="aboutTitle">About ACPS</h2>
                    <div id="aboutContent">
                        {!! nl2br(e($content->content)) !!}
                    </div>
                    <a href="{{ route('about.history') }}" class="btn">Read More</a>
                </div>
            </div>
        </section>

        <!-- Notice Section -->
        <section class="notice-section">
            <h2 class="section-title">Notices & Events</h2>
            <div class="notice-container">
                <div class="notice-board">
                    <div class="notice-header">
                        <h3>Latest Notices</h3>
                        <a href="{{ $noticeController->getNoticeSectionUrl('Notices') }}" class="view-all">View All</a>
                    </div>
                    <ul class="notice-list" id="noticeList">
                        <!-- Notices will be dynamically added here -->
                    </ul>
                </div>

                <div class="upcoming-events">
                    <div class="notice-header">
                        <h3>Upcoming Events</h3>
                        <a href="{{ route('about.news-events') }}" class="view-all">View All</a>
                    </div>
                    <div id="eventsList">
                        <!-- Events will be dynamically added here -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Academic Programs -->
        {{-- <section class="programs-section">
            <h2 class="section-title">Academic Programs</h2>
            <div class="programs-container">
                <div class="program-cards">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-book"></i>
                            <h3>Primary Education</h3>
                        </div>
                        <div class="program-content">
                            <p>Our primary education program focuses on building strong foundations in literacy, numeracy,
                                and social skills for grades 1-5.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-graduation-cap"></i>
                            <h3>Secondary Education</h3>
                        </div>
                        <div class="program-content">
                            <p>Comprehensive secondary education program for grades 6-10 following the national curriculum
                                with emphasis on all core subjects.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-university"></i>
                            <h3>Higher Secondary</h3>
                        </div>
                        <div class="program-content">
                            <p>Specialized programs in Science, Commerce, and Humanities for grades 11-12 preparing students
                                for higher education.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Global variables for slider
        let currentSlide = 0;
        let slideInterval;
        let slides = [];

        function showSlide(n) {
            if (slides.length === 0) return;

            slides.forEach(slide => slide.classList.remove('active'));
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        function startSlider() {
            // Clear existing interval if any
            if (slideInterval) {
                clearInterval(slideInterval);
            }

            // Get slides after they're loaded
            slides = document.querySelectorAll('.hero-slider .slide');

            if (slides.length > 0) {
                // Ensure first slide is active
                showSlide(0);

                // Auto-advance slides every 5 seconds
                slideInterval = setInterval(() => {
                    showSlide(currentSlide + 1);
                }, 5000);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Fetch and display top notices (marquee)
            fetchTopNotices();

            // Fetch and display latest notices
            fetchLatestNotices();

            // Fetch and display events
            fetchEvents();

            // Fetch and display about section
            fetchAboutUs();

            // Fetch home images for slider LAST, then initialize slider
            fetchHomeImages().then(() => {
                // Initialize slider after images are loaded
                setTimeout(() => {
                    startSlider();
                }, 100);
            });

            // Mobile menu toggle
            const mobileToggle = document.querySelector('.mobile-toggle');
            const navMenu = document.querySelector('.nav-menu');

            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
            }

            // Newsletter form submission
            const newsletterForm = document.querySelector('.newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const email = this.querySelector('input[type="email"]').value;
                    if (email) {
                        alert('Thank you for subscribing to our newsletter!');
                        this.reset();
                    }
                });
            }
        });
        // Function to fetch top notices for marquee
        async function fetchTopNotices() {
            try {
                const response = await axios.get('{{ route('latest-notices') }}');
                const notices = response.data;

                const topNoticeContent = document.getElementById('topNoticeContent');
                topNoticeContent.innerHTML = '';

                if (notices && notices.length > 0) {
                    notices.forEach((notice) => {
                        const noticeLink = document.createElement('a');
                        noticeLink.className = 'top-notice-item';
                        noticeLink.textContent = notice.title || notice.headline;
                        noticeLink.href = notice.url || '#';

                        // if (notice.file_url) {
                        //     noticeLink.target = '_blank';
                        // }

                        topNoticeContent.appendChild(noticeLink);
                    });

                    // Clone the content for seamless looping if we have notices
                    if (notices.length > 1) {
                        const clone = topNoticeContent.cloneNode(true);
                        topNoticeContent.parentNode.appendChild(clone);
                    }
                } else {
                    // Fallback if no notices
                    topNoticeContent.innerHTML = '<a class="top-notice-item">No recent notices</a>';
                }
            } catch (error) {
                console.error('Error fetching top notices:', error);
                document.getElementById('topNoticeContent').innerHTML =
                    '<a class="top-notice-item">Unable to load notices</a>';
            }
        }

        // Function to fetch latest notices for notice board
        async function fetchLatestNotices() {
            try {
                const response = await axios.get('{{ route('latest-notices') }}');
                const notices = response.data;

                const noticeList = document.getElementById('noticeList');
                noticeList.innerHTML = '';

                if (notices && notices.length > 0) {
                    // Show only first 5 notices
                    notices.slice(0, 5).forEach((notice) => {
                        const listItem = document.createElement('li');
                        listItem.className = 'notice-item';

                        const link = document.createElement('a');
                        link.href = notice.url || '#';
                        // if (notice.file_url) {
                        //     link.target = '_blank';
                        // }

                        const icon = document.createElement('i');
                        icon.className = 'fas fa-bullhorn';

                        const text = document.createElement('span');
                        text.textContent = notice.title || notice.headline;

                        // const date = document.createElement('span');
                        // if (notice.created_at) {
                        //     const d = new Date(notice.created_at);
                        //     date.textContent = d.toLocaleDateString('en-GB'); // dd/mm/yyyy
                        // } else {
                        //     date.textContent = '';
                        // }
                        // date.className = 'notice-date';

                        link.appendChild(icon);
                        link.appendChild(text);

                        listItem.appendChild(link);
                        noticeList.appendChild(listItem);
                    });
                } else {
                    noticeList.innerHTML =
                        '<li class="notice-item"><a href="#"><i class="fas fa-bullhorn"></i><span>No recent notices</span></a></li>';
                }
            } catch (error) {
                console.error('Error fetching latest notices:', error);
                document.getElementById('noticeList').innerHTML =
                    '<li class="notice-item"><a href="#"><i class="fas fa-bullhorn"></i><span>Unable to load notices</span></a></li>';
            }
        }

        // Function to fetch events
        async function fetchEvents() {
            try {
                const response = await axios.get('{{ route('latest-events') }}');
                const events = response.data;

                const eventsList = document.getElementById('eventsList');
                eventsList.innerHTML = '';

                if (events && events.length > 0) {
                    // Show only first 3 events
                    events.slice(0, 3).forEach((event) => {
                        const eventItem = document.createElement('div');
                        eventItem.className = 'event-item';

                        const eventDate = document.createElement('div');
                        eventDate.className = 'event-date';

                        // Parse date or use current date as fallback
                        const eventDateObj = event.created_at ? new Date(event.created_at) : new Date();
                        const day = eventDateObj.getDate();
                        const month = eventDateObj.toLocaleString('default', {
                            month: 'short'
                        });

                        const dayDiv = document.createElement('div');
                        dayDiv.className = 'day';
                        dayDiv.textContent = day;

                        const monthDiv = document.createElement('div');
                        monthDiv.className = 'month';
                        monthDiv.textContent = month;

                        eventDate.appendChild(dayDiv);
                        eventDate.appendChild(monthDiv);

                        const eventDetails = document.createElement('div');
                        eventDetails.className = 'event-details';

                        const title = document.createElement('h4');
                        title.textContent = event.headline || 'Upcoming Event';

                        const description = document.createElement('p');
                        description.textContent = event.tag || 'School event';

                        eventDetails.appendChild(title);
                        eventDetails.appendChild(description);

                        eventItem.appendChild(eventDate);
                        eventItem.appendChild(eventDetails);
                        eventsList.appendChild(eventItem);
                    });
                } else {
                    eventsList.innerHTML = `
                        <div class="event-item">
                            <div class="event-date">
                                <div class="day">15</div>
                                <div class="month">Dec</div>
                            </div>
                            <div class="event-details">
                                <h4>Annual Cultural Program</h4>
                                <p>School auditorium, 10:00 AM</p>
                            </div>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Error fetching events:', error);
                document.getElementById('eventsList').innerHTML = `
                    <div class="event-item">
                        <div class="event-date">
                            <div class="day">--</div>
                            <div class="month">---</div>
                        </div>
                        <div class="event-details">
                            <h4>Unable to load events</h4>
                            <p>Please try again later</p>
                        </div>
                    </div>
                `;
            }
        }

        // Function to fetch home images for slider
        // Function to fetch home images for slider - SIMPLE VERSION FOR STRING ARRAY
        async function fetchHomeImages() {
            try {
                const response = await axios.get('{{ route('home-image') }}');
                const images = response.data;
                const heroSlider = document.getElementById('heroSlider');

                console.log('Images data:', images);

                if (images && images.length > 0) {
                    heroSlider.innerHTML = '';

                    images.forEach((imagePath, index) => {
                        const slide = document.createElement('div');
                        slide.className = 'slide';

                        // Since images is array of strings, use the string directly
                        let path = imagePath;

                        // Clean the path if needed
                        if (path.includes('storage/')) {
                            path = path.replace('storage/', '');
                        }
                        if (path.includes('public/')) {
                            path = path.replace('public/', '');
                        }

                        const imageUrl = `/storage/${path}`;
                        console.log(`Image URL: ${imageUrl}`);

                        slide.style.backgroundImage = `url('${imageUrl}')`;

                        const slideContent = document.createElement('div');
                        slideContent.className = 'slide-content';

                        const title = document.createElement('h2');
                        title.textContent = 'Welcome to BGAB';

                        const description = document.createElement('p');
                        description.textContent = 'Providing quality education for the future';

                        const button = document.createElement('a');
                        button.href = '/about/why-study';
                        button.className = 'btn';
                        button.textContent = 'Learn More';

                        slideContent.appendChild(title);
                        slideContent.appendChild(description);
                        slideContent.appendChild(button);
                        slide.appendChild(slideContent);
                        heroSlider.appendChild(slide);
                    });

                    return true; // Success
                }
                return false;
            } catch (error) {
                console.error('Error fetching home images:', error);
                return false;
            }
        }
        // Function to fetch about us content
        async function fetchAboutUs() {
            try {
                const response = await axios.get('{{ route('about-us') }}');
                const aboutData = response.data;

                if (aboutData) {
                    // Update about title
                    if (aboutData.title) {
                        document.getElementById('aboutTitle').textContent = aboutData.title;
                    }

                    // Update about content
                    if (aboutData.content) {
                        document.getElementById('aboutContent').innerHTML = aboutData.content;
                    }

                    // Update about image if available
                    if (aboutData.image_url || aboutData.image) {
                        document.getElementById('aboutImage').src = aboutData.image_url || aboutData.image;
                    }
                }
                // If no about data, the static content remains
            } catch (error) {
                console.error('Error fetching about us content:', error);
                // Keep the static about content if there's an error
            }
        }
    </script>
@endsection
