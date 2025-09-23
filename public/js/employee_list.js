document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const teacherCards = document.querySelectorAll('.teacher-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to clicked button
            this.classList.add('active');

            const filterText = this.textContent;

            // Show/hide teachers based on filter
            if (filterText === "All Faculty") {
                teacherCards.forEach(card => {
                    card.style.display = 'block';
                });
            } else {
                teacherCards.forEach(card => {
                    const subject = card.querySelector('.teacher-subject').textContent.toLowerCase();
                    const designation = card.querySelector('.teacher-designation').textContent.toLowerCase();

                    if (filterText === "Science Department" &&
                        (subject.includes('physics') || subject.includes('chemistry') ||
                         subject.includes('mathematics') || subject.includes('computer'))) {
                        card.style.display = 'block';
                    } else if (filterText === "Arts Department" &&
                        (subject.includes('english') || subject.includes('history') ||
                         subject.includes('arts') || designation.includes('arts'))) {
                        card.style.display = 'block';
                    } else if (filterText === "Administration" &&
                        (designation.includes('head') || designation.includes('administration'))) {
                        card.style.display = 'block';
                    } else if (filterText === "Senior Teachers" &&
                        (designation.includes('senior') || designation.includes('head'))) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.search-box input');

    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();

        teacherCards.forEach(card => {
            const name = card.querySelector('h3').textContent.toLowerCase();
            const subject = card.querySelector('.teacher-subject').textContent.toLowerCase();
            const teacherId = card.querySelector('.teacher-id').textContent.toLowerCase();

            if (name.includes(searchTerm) || subject.includes(searchTerm) || teacherId.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
