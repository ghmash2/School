document.addEventListener('DOMContentLoaded', function() {
    // Slider functionality
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');
    const prevArrow = document.querySelector('.arrow.prev');
    const nextArrow = document.querySelector('.arrow.next');
    let currentSlide = 0;
    let slideInterval;

    // Function to show a specific slide
    function showSlide(n) {
        // Reset all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        // Update current slide index
        currentSlide = (n + slides.length) % slides.length;

        // Show current slide and activate corresponding dot
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    // Function to show next slide
    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    // Function to show previous slide
    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    // Start automatic sliding
    function startSlider() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    // Stop automatic sliding
    function stopSlider() {
        clearInterval(slideInterval);
    }

    // Event listeners for arrows
    nextArrow.addEventListener('click', function() {
        stopSlider();
        nextSlide();
        startSlider();
    });

    prevArrow.addEventListener('click', function() {
        stopSlider();
        prevSlide();
        startSlider();
    });

    // Event listeners for dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            stopSlider();
            showSlide(index);
            startSlider();
        });
    });

    // Pause slider on hover
    const slider = document.querySelector('.image-slider');
    slider.addEventListener('mouseenter', stopSlider);
    slider.addEventListener('mouseleave', startSlider);

    // Initialize slider
    startSlider();
});
