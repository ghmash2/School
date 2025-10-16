@php
    $info = \App\Models\BasicInfo::first();
@endphp
<!-- layouts/footer.blade.php -->
<footer class="main-footer">
    <div class="footer-top">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i><a href="{{ $info->google_map }}" style="color:white">{{ $info->address }}</a></p>
                    <p><i class="fas fa-phone"></i> {{ $info->phone }}</p>
                    <p><i class="fas fa-envelope"></i> {{ $info->email }}</p>
                    <p><i class="fas fa-clock"></i> {{ $info->office_time }}</p>

                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about.glance') }}">About Us</a></li>
                    <li><a href="{{ route('academic.calendar') }}">Academics</a></li>
                    <li><a href="{{ route('admission.circular') }}">Admission</a></li>
                    <li><a href="{{ route('academic.result') }}">Results</a></li>

                </ul>
            </div>

            <div class="footer-section">
                <h3>Important Links</h3>
                <ul class="footer-links">
                    <li><a href="https://moedu.portal.gov.bd/">Ministry of Education</a></li>
                    <li><a href="https://dhakaeducationboard.portal.gov.bd/">Board of Intermediate Education</a></li>
                    <li><a href="https://nctb.gov.bd/">National Curriculum</a></li>
                    <li><a href="https://shed.gov.bd/site/view/scholarship/Scholarship-Notification">Scholarship
                            Information</a></li>
                    <li><a href="https://www.ilo.org/publications/tvet-students-career-guidance-workbook-bangla">Career
                            Opportunities</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="{{ $info->facebook }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $info->twitter }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $info->instagram }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $info->youtube }}"><i class="fab fa-youtube"></i></a>

                </div>

                {{-- <div class="newsletter">
                    <h4>Subscribe to Newsletter</h4>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-bottom-content">
                <p>&copy; <a href="https://worldtechsoft.com/" style="color: aliceblue">World Tech</a></p>
                <div class="footer-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // JavaScript for mobile menu toggle (if needed)
    document.addEventListener('DOMContentLoaded', function() {
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
