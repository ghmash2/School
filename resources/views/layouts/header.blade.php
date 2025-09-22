
<body>
    <!-- Top info bar -->
    <div class="top-info-bar">
        <div class="top-info-container">
            <div class="top-info-left">
                <div class="top-info-item">
                    <i class="fas fa-phone"></i>
                    <span>+88 01234567891</span>
                </div>
                <div class="top-info-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@acps.edu.bd</span>
                </div>
            </div>
            <div class="top-info-right">
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main header -->
    <header class="main-header">
        <div class="header-container">
            <div class="logo-container">
                <div class="logo">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="school-name">
                    <h1>ACPS School & College</h1>
                    <p>Education for Tomorrow's Leaders</p>
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
                    <a href="#">About Us <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('about.glance') }}">At a Glance</a>
                        <a href="{{ route('about.history') }}">History</a>
                        <a href="{{ route('about.why-study') }}">Why Study at ACPS</a>
                        <a href="{{ route('about.infrastructure') }}">Infrastructure</a>
                        <a href="{{ route('about.achievements') }}">Achievements</a>
                        <a href="{{ route('about.news-events') }}">News And Events</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Administration <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('admin.governing-body') }}">Governing Body</a>
                        <a href="{{ route('admin.chairman-message') }}">Message Of Chairman</a>
                        <a href="{{ route('admin.principal-message') }}">Message of Principal</a>
                        <a href="{{ route('admin.ex-chairmans') }}">Ex-Chairmans</a>
                        <a href="{{ route('admin.ex-principals') }}">Ex-Principals</a>
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
                                <a href="{{ route('academic.suggestion') }}">Suggestion</a>
                                <a href="{{ route('academic.exam-routine') }}">Exam Routine</a>
                                <a href="{{ route('academic.notice') }}">Notice</a>
                                <a href="{{ route('academic.other') }}">Other</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Admission <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('admission.circular') }}">Admission Circular</a>
                                <a href="{{ route('admission.prospectus') }}">Prospectus</a>
                                <a href="{{ route('admission.form') }}">Admission Form</a>
                                <a href="{{ route('admission.result') }}">Admission Result</a>
                                <a href="{{ route('admission.waiting-list') }}">Waiting List</a>
                                <a href="{{ route('admission.courses') }}">Course/Program</a>
                                <a href="{{ route('admission.admit-card') }}">Download Admit Card</a>
                    </div>
                </li>

                <li class="menu-item">
                    <a href="#">Co-curricular <i class="fas fa-chevron-down"></i></a>
                    <div class="dropdown">
                        <a href="{{ route('co-curricular.sports') }}">Sports</a>
                                <a href="{{ route('co-curricular.tour') }}">Tour</a>
                                <a href="{{ route('co-curricular.scout') }}">Scout</a>
                                <a href="{{ route('co-curricular.bncc') }}">BNCC</a>
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
                                <a href="{{ route('club.quiz') }}">Quiz Club</a>
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
                    </div>
                </li>
                 <li class="menu-item">
                    <a href="{{ route('contact') }}"">Contact <i class="fas fa-chevron-down"></i></a>
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

