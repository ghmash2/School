document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const noticeItems = document.querySelectorAll('.notice-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            const filterText = this.textContent;

            // Show/hide notices based on filter
            if (filterText === "All Notices") {
                noticeItems.forEach(item => {
                    item.style.display = 'grid';
                });
            } else {
                noticeItems.forEach(item => {
                    // In a real application, this would check data attributes
                    const headline = item.querySelector('.notice-headline').textContent.toLowerCase();
                    if (filterText === "For Students" && headline.includes('class') || headline.includes('exam')) {
                        item.style.display = 'grid';
                    } else if (filterText === "For Parents" && headline.includes('parent')) {
                        item.style.display = 'grid';
                    } else if (filterText === "For Staff" && headline.includes('staff')) {
                        item.style.display = 'grid';
                    } else if (filterText === "Academic" && (headline.includes('exam') || headline.includes('academic'))) {
                        item.style.display = 'grid';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.search-box input');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();

        noticeItems.forEach(item => {
            const headline = item.querySelector('.notice-headline').textContent.toLowerCase();
            if (headline.includes(searchTerm)) {
                item.style.display = 'grid';
            } else {
                item.style.display = 'none';
            }
        });
    });

    // Download button functionality
    const downloadButtons = document.querySelectorAll('.download-btn');

    downloadButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const headline = this.closest('.notice-item').querySelector('.notice-headline a').textContent;

            // In a real application, this would trigger a file download
            alert(`Downloading: ${headline}\n\nIn a real application, this would download the actual file.`);
        });
    });
});
