document.addEventListener('DOMContentLoaded', function() {
    // Show full news when "See All" is clicked
    const seeAllLinks = document.querySelectorAll('.see-all-link');
    const fullNewsSections = document.querySelectorAll('.full-news');
    const newsItems = document.querySelectorAll('.news-item');

    seeAllLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const newsId = this.getAttribute('data-news');

            // Hide all full news sections
            fullNewsSections.forEach(section => {
                section.classList.remove('active');
            });

            // Hide all news items
            newsItems.forEach(item => {
                item.style.display = 'none';
            });

            // Show the selected full news
            document.getElementById('full-news-' + newsId).classList.add('active');
        });
    });

    // Back to list functionality
    const backToListLinks = document.querySelectorAll('.back-to-list');

    backToListLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Hide all full news sections
            fullNewsSections.forEach(section => {
                section.classList.remove('active');
            });

            // Show all news items
            newsItems.forEach(item => {
                item.style.display = 'flex';
            });
        });
    });

    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            // In a real application, this would filter the news items
            // For this demo, we'll just show a message
            const filterText = this.textContent;
            if (filterText !== "All News") {
                alert(`Filtering by: ${filterText}. In a real application, this would filter the news list.`);
            }
        });
    });
});
