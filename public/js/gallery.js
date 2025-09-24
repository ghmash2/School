document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            // Show/hide gallery items based on filter
            galleryItems.forEach(item => {
                if (filterValue === 'all') {
                    item.style.display = 'block';
                } else {
                    const categories = item.getAttribute('data-category');
                    if (categories.includes(filterValue)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });

    // Search functionality
    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();

            galleryItems.forEach(item => {
                const title = item.getAttribute('data-title').toLowerCase();
                const caption = item.querySelector('.media-caption h3').textContent.toLowerCase();
                const description = item.querySelector('.media-caption p').textContent.toLowerCase();

                if (title.includes(searchTerm) || caption.includes(searchTerm) || description.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }

    // Modal functionality for images
    const modal = document.getElementById('mediaModal');
    const modalCaption = document.getElementById('modalCaption');
    const closeBtn = document.querySelector('.close');

    // Image gallery functionality
    const imageItems = document.querySelectorAll('.gallery-item .media-overlay');
    imageItems.forEach(overlay => {
        overlay.addEventListener('click', function() {
            const galleryItem = this.closest('.gallery-item');
            const img = galleryItem.querySelector('img');
            const fullsizeSrc = img.getAttribute('data-fullsize') || img.src;
            const title = galleryItem.getAttribute('data-title');

            // Check if this is an image gallery
            const modalImage = document.getElementById('modalImage');
            if (modalImage) {
                modalImage.src = fullsizeSrc;
                modalImage.alt = title;
                modalCaption.innerHTML = title;
                modal.style.display = 'block';
            }
        });
    });

    // Video gallery functionality
    const videoButtons = document.querySelectorAll('.video-play-btn');
    videoButtons.forEach(button => {
        button.addEventListener('click', function() {
            const galleryItem = this.closest('.gallery-item');
            const title = galleryItem.getAttribute('data-title');

            // In a real application, you would load the actual video URL
            // For demonstration, we'll use a placeholder
            const videoFrame = document.getElementById('videoFrame');
            if (videoFrame) {
                // Replace with actual video URL in production
                videoFrame.src = 'https://www.youtube.com/embed/dQw4w9WgXcQ'; // Example video
                modalCaption.innerHTML = title;
                modal.style.display = 'block';
            } else {
                // Fallback alert for demonstration
                alert(`Playing: ${title}\n\nIn a real application, this would open the actual video.`);
            }
        });
    });

    // Close modal
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';

            // Stop video when closing modal
            const videoFrame = document.getElementById('videoFrame');
            if (videoFrame) {
                videoFrame.src = '';
            }
        });
    }

    // Close modal when clicking outside the content
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';

            // Stop video when closing modal
            const videoFrame = document.getElementById('videoFrame');
            if (videoFrame) {
                videoFrame.src = '';
            }
        }
    });

    // Keyboard navigation for modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';

            // Stop video when closing modal
            const videoFrame = document.getElementById('videoFrame');
            if (videoFrame) {
                videoFrame.src = '';
            }
        }
    });
});
