@php
    $info = \App\Models\BasicInfo::first();
@endphp
<body>
    <!-- Main header -->
    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                 <img src="{{ asset('storage/' . $info->logo) }}" alt="logo" class="logo">
                <div class="school-name">
                    <h1>{{ $info->name }}</h1>
                    <p>{{ $info->motto }}</p>
                </div>
            </div>
            <div>
                <div class="contact-info" style="color: white">
                    <p>EIIN: {{ $info->eiin }}</p>
                    <p><i class="fas fa-phone"></i> {{ $info->phone }}</p>
                    <p><i class="fas fa-envelope"></i> {{ $info->email }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation menu -->
    <nav class="main-nav">
        <div class="nav-container">
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li class="menu-item">
                    <a href="{{ route('home') }}">Home </a>
                </li>
                <li class="menu-item">
                    <a href="#">About Us <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('about.glance') }}">At a Glance</a>
                        <a href="{{ route('about.history') }}">History</a>
                        <a href="{{ route('about.why-study') }}">Why Study at BGAB</a>
                        {{-- <a href="{{ route('about.infrastructure') }}">Infrastructure</a> --}}
                        <a href="{{ route('about.achievements') }}">Achievements</a>
                        <a href="{{ route('about.news-events') }}">News And Events</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Administration <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        {{-- <a href="{{ route('admin.governing-body') }}">Governing Body</a> --}}
                        <a href="{{ route('admin.chairman-message') }}">Message Of Chairman</a>
                        <a href="{{ route('admin.principal-message') }}">Message of Principal</a>
                        {{-- <a href="{{ route('admin.ex-chairmans') }}">Ex-Chairmans</a>
                        <a href="{{ route('admin.ex-principals') }}">Ex-Principals</a> --}}
                        <a href="{{ route('admin.teachers') }}">Teacher Information</a>
                        <a href="{{ route('admin.staffs') }}">Staff Information</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Academic <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('academic.calendar') }}">Academic Calendar</a>
                        <a href="{{ route('academic.routine') }}">Class Routine</a>
                        <a href="{{ route('academic.syllabus') }}">Syllabus And Booklist</a>
                        {{-- <a href="{{ route('academic.suggestion') }}">Suggestion</a> --}}
                        <a href="{{ route('academic.exam-routine') }}">Exam Routine</a>
                        <a href="{{ route('academic.notice') }}">Notice</a>
                        <a href="{{ route('academic.result') }}">Result</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Admission <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('admission.circular') }}">Admission Circular</a>
                        <a href="{{ route('admission.prospectus') }}">Prospectus</a>
                        {{-- <a href="{{ route('admission.form') }}">Admission Form</a> --}}
                        <a href="{{ route('admission.admission-result') }}">Admission Result</a>
                        <a href="{{ route('admission.waiting-list') }}">Waiting List</a>
                        <a href="{{ route('admission.courses') }}">Courses</a>
                        <a href="{{ route('admission.admit-card') }}">Admit Card</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Co-curricular <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('co-curricular.sports') }}">Sports</a>
                        <a href="{{ route('co-curricular.tour') }}">Tour</a>
                        <a href="{{ route('co-curricular.scout') }}">Scout</a>
                        {{-- <a href="{{ route('co-curricular.bncc') }}">BNCC</a> --}}
                    </div>
                </li>
                <li class="menu-item">
                    <a href="#">Club <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('club.ict') }}">ICT Club</a>
                        <a href="{{ route('club.science') }}">Science Club</a>
                        <a href="{{ route('club.debate') }}">Debate Club</a>
                        <a href="{{ route('club.photography') }}">Photography Club</a>
                        <a href="{{ route('club.cultural') }}">Cultural Club</a>
                        <a href="{{ route('club.language') }}">Language Club</a>
                        {{-- <a href="{{ route('club.quiz') }}">Quiz Club</a> --}}
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Digital Contents <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('digital.six') }}">Class Six</a>
                        <a href="{{ route('digital.seven') }}">Class Seven</a>
                        <a href="{{ route('digital.eight') }}">Class Eight</a>
                        <a href="{{ route('digital.nine-ten') }}">Class Nine-Ten</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Gallery <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('gallery.photo') }}">Photo Gallery</a>
                        <a href="{{ route('gallery.video') }}">Video Gallery</a>
                        {{-- <a href="{{ route('test') }}">Test</a> --}}
                    </div>
                </li>
                <li class="menu-item">
                    <a href="{{ route('showLogin') }}">Login </a>
                </li>
            </ul>
        </div>
    </nav>


    <script>
        // Mobile menu toggle functionality
        document.getElementById('mobileToggle').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('active');
        });

        // For mobile, toggle dropdowns on click
        if (window.innerWidth <= 992) {
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.querySelector('a').addEventListener('click', function(e) {
                    e.preventDefault();
                    item.classList.toggle('active');
                });
            });
        }
    </script>
</body>
