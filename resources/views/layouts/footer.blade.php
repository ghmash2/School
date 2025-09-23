<!-- layouts/footer.blade.php -->
<footer class="main-footer">
    <div class="footer-top">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="footer-contact">
                    <p><i class="fas fa-map-marker-alt"></i> Agrabad, Chittagong, Bangladesh</p>
                    <p><i class="fas fa-phone"></i> +88 031 1234567</p>
                    <p><i class="fas fa-envelope"></i> info@acps.edu.bd</p>
                </div>
            </div>

            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Academics</a></li>
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">Results</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Important Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Ministry of Education</a></li>
                    <li><a href="#">Board of Intermediate Education</a></li>
                    <li><a href="#">National Curriculum</a></li>
                    <li><a href="#">Scholarship Information</a></li>
                    <li><a href="#">Career Opportunities</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <div class="newsletter">
                    <h4>Subscribe to Newsletter</h4>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
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
                    <a href="#">Sitemap</a>
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
