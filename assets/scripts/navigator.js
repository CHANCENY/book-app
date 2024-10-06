// Disable click loading effects and add a loading effect with a progress bar
document.addEventListener('DOMContentLoaded', () => {
   anchorEventSubcribers();
});

// Search functionality
const searchIcon = document.getElementById('search-icon');
const searchInput = document.getElementById('search-input');

searchIcon.addEventListener('click', () => {
    // Toggle the visibility of the search input
    if (searchInput.style.display === 'none' || searchInput.style.display === '') {
        searchInput.style.display = 'block'; // Show the input
        searchInput.focus(); // Set focus on the input
    } else {
        searchInput.style.display = 'none'; // Hide the input
    }
});
