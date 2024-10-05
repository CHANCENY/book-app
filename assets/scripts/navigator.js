// Disable click loading effects and add a loading effect with a progress bar
document.addEventListener('DOMContentLoaded', () => {
    const body = document.body; // Select the entire body
    const links = body.getElementsByTagName('a'); // Get all links in the body

    // Create a loading overlay
    const loadingOverlay = document.createElement('div');
    loadingOverlay.className = 'loading-overlay';
    
    // Use FontAwesome spinner icon instead of text
    loadingOverlay.innerHTML = '<i class="fa-duotone fa-solid fa-spinner-third fa-spin"></i>'; // Add spinner icon
    document.body.appendChild(loadingOverlay); // Append to body

    // Create a progress bar
    const progressBar = document.createElement('div');
    progressBar.className = 'progress-bar';
    loadingOverlay.appendChild(progressBar); // Append progress bar to loading overlay

    // Get the navigation drawer and overlay
    const navDrawer = document.getElementById('nav-drawer');
    const overlay = document.getElementById('overlay');

    // Prevent the default link behavior and show loading effect
    for (let link of links) {
        link.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default behavior
            const page = link.getAttribute('href'); // Get the href of the clicked link
            console.log('Link click silenced: ', page);

            // Show loading effect
            loadingOverlay.style.display = 'flex'; // Show loading overlay
            progressBar.style.width = '0%'; // Reset progress bar width
            
            // Start loading animation
            let width = 0;
            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                } else {
                    width++; // Increase width
                    progressBar.style.width = width + '%'; // Update progress bar width
                }
            }, 20); // Speed of progress bar animation
            
            // Close navigation drawer
            navDrawer.classList.remove('open'); // Hide the drawer
            overlay.classList.remove('active'); // Hide the overlay

            // Create an XMLHttpRequest to fetch data
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `${BASE_URL}/api/content/pages?page=${page}`, true);
            
            // Define the callback for the XMLHttpRequest
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const responseData = JSON.parse(xhr.responseText);
                    
                    // Check for error in response
                    if (responseData.error) {
                        console.error('No data found');
                        alert('No data found'); // Alert user if there's an error
                    } else {
                        const content = responseData.content; // Get HTML content
                        const contentDiv = document.getElementById('content'); // Select content div
                        contentDiv.innerHTML = content; // Replace content inside #content
                    }
                } else {
                    console.error('Request failed with status: ', xhr.status);
                }

                // Delay hiding the loading overlay and progress bar
                setTimeout(() => {
                    loadingOverlay.style.display = 'none'; // Hide loading overlay after delay
                    progressBar.style.width = '0%'; // Reset progress bar
                }, 5000); // 5 seconds delay
            };

            // Handle errors
            xhr.onerror = function() {
                console.error('Request failed');
                // Delay hiding the loading overlay and progress bar
                setTimeout(() => {
                    loadingOverlay.style.display = 'none'; // Hide loading overlay after delay
                    progressBar.style.width = '0%'; // Reset progress bar
                }, 5000); // 5 seconds delay
            };

            // Send the request
            xhr.send();
        });
    }
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
