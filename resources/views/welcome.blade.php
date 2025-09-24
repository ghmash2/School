@extends('layouts.app')
<head>
    <title>ACPS School - Home</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
@section('content')
    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Slider -->
        <section class="hero-slider">
            {{-- <div class="slide active" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h2>Welcome to ACPS</h2>
                    <p>Providing quality education since 1985. Shaping future leaders with excellence and integrity.</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div> --}}
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1562813733-b31f71025d54?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h2>Academic Excellence</h2>
                    <p>Our students consistently achieve outstanding results in national examinations.</p>
                    <a href="#" class="btn">View Results</a>
                </div>
            </div>
            <div class="slide" style="background-image: url('https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="slide-content">
                    <h2>Extracurricular Activities</h2>
                    <p>We believe in holistic development through sports, arts, and cultural activities.</p>
                    <a href="#" class="btn">Our Programs</a>
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
                        <a href="#" class="view-all">View All</a>
                    </div>
                    <ul class="notice-list">
                        <li class="notice-item">
                            <a href="#">
                                <i class="fas fa-bullhorn"></i>
                                <span>Admission notice for class XI - 2023</span>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#">
                                <i class="fas fa-bullhorn"></i>
                                <span>Annual Sports Day postponed to next month</span>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#">
                                <i class="fas fa-bullhorn"></i>
                                <span>Parent-Teacher meeting schedule for December</span>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#">
                                <i class="fas fa-bullhorn"></i>
                                <span>Holiday notice for Victory Day</span>
                            </a>
                        </li>
                        <li class="notice-item">
                            <a href="#">
                                <i class="fas fa-bullhorn"></i>
                                <span>Result publication date for first term examination</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="upcoming-events">
                    <div class="notice-header">
                        <h3>Upcoming Events</h3>
                        <a href="#" class="view-all">View All</a>
                    </div>
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
                    <div class="event-item">
                        <div class="event-date">
                            <div class="day">20</div>
                            <div class="month">Dec</div>
                        </div>
                        <div class="event-details">
                            <h4>Science Fair Exhibition</h4>
                            <p>Science lab building, 9:00 AM</p>
                        </div>
                    </div>
                    <div class="event-item">
                        <div class="event-date">
                            <div class="day">25</div>
                            <div class="month">Dec</div>
                        </div>
                        <div class="event-details">
                            <h4>Christmas Celebration</h4>
                            <p>Main playground, 11:00 AM</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="about-container">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1524178239889-8cf4d46cf15e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="ACPS School Building">
                </div>
                <div class="about-content">
                    <h2>About ACPS</h2>
                    <p>Bawany Government  Adarsha Biddyalaya is a premier educational institution established in 1985. With a rich history of academic excellence, we have been shaping young minds to become responsible citizens and future leaders.</p>
                    <p>Our campus features state-of-the-art facilities including modern classrooms, well-equipped laboratories, a comprehensive library, and extensive sports facilities. We believe in holistic education that nurtures intellectual, physical, and emotional growth.</p>
                    <p>Our dedicated faculty members are committed to providing quality education and personalized attention to each student. We follow a student-centric approach that encourages critical thinking, creativity, and character development.</p>
                    <a href="#" class="btn">Read More</a>
                </div>
            </div>
        </section>

        <!-- Academic Programs -->
        <section class="programs-section">
            <h2 class="section-title">Academic Programs</h2>
            <div class="programs-container">
                <div class="program-cards">
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-book"></i>
                            <h3>Primary Education</h3>
                        </div>
                        <div class="program-content">
                            <p>Our primary education program focuses on building strong foundations in literacy, numeracy, and social skills for grades 1-5.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-graduation-cap"></i>
                            <h3>Secondary Education</h3>
                        </div>
                        <div class="program-content">
                            <p>Comprehensive secondary education program for grades 6-10 following the national curriculum with emphasis on all core subjects.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="fas fa-university"></i>
                            <h3>Higher Secondary</h3>
                        </div>
                        <div class="program-content">
                            <p>Specialized programs in Science, Commerce, and Humanities for grades 11-12 preparing students for higher education.</p>
                            <a href="#" class="btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileToggle = document.querySelector('.mobile-toggle');
            const navMenu = document.querySelector('.nav-menu');

            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('active');
                });
            }

            // Simple slider functionality
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;

            function showSlide(n) {
                slides.forEach(slide => slide.classList.remove('active'));
                currentSlide = (n + slides.length) % slides.length;
                slides[currentSlide].classList.add('active');
            }

            // Auto-advance slides every 5 seconds
            setInterval(() => {
                showSlide(currentSlide + 1);
            }, 5000);

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
    </script>
@endsection
