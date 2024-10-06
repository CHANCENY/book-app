const BASE_URL = "https://api-precious.articlepulsehub.com";

const SUBMISSION_URL = "/api/forms/submission";


function formEventSubscribers() {
    const body = document.body; // Select the entire body
    const forms = body.getElementsByTagName('form'); // Get all forms in the body

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

    // Prevent the default form submission behavior and show loading effect
    for (let form of forms) {
        form.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default behavior
            
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

            // Create an XMLHttpRequest to send form data
            const xhr = new XMLHttpRequest();
            xhr.open('POST',BASE_URL+ SUBMISSION_URL, true); // Use form action as URL
        
            // Define the callback for the XMLHttpRequest
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const responseData = JSON.parse(xhr.responseText);
                    console.log(responseData)
                    // Check for error in response
                    if (responseData.error) {
                        console.error('No data found');
                        alert('No data found'); // Alert user if there's an error
                    } else {
                        const content = responseData.content; // Get HTML content
                        const contentDiv = document.getElementById('content'); // Select content div
                        contentDiv.innerHTML = content; // Replace content inside #content
                        anchorEventSubcribers();
                        formEventSubscribers();
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

            // Create FormData object to send form data
            const formData = new FormData(form);
            xhr.send(formData); // Send the request
        });
    }
}


function anchorEventSubcribers() {
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
            xhr.withCredentials = true;
            // Define the callback for the XMLHttpRequest
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 300) {
                    const responseData = JSON.parse(xhr.responseText);
                    
                    // Check for error in response
                    if (responseData.error) {
                        console.error('No data found');
                       showToast("Oops not content", "Error");
                    } else {
                        const content = responseData.content; // Get HTML content
                        const contentDiv = document.getElementById('content'); // Select content div
                        contentDiv.innerHTML = content; // Replace content inside #content
                        anchorEventSubcribers();
                        formEventSubscribers();
                    }
                } else {
                    console.error('Request failed with status: ', xhr.status);
                }

                // Delay hiding the loading overlay and progress bar
                setTimeout(() => {
                    loadingOverlay.style.display = 'none'; // Hide loading overlay after delay
                    progressBar.style.width = '0%'; // Reset progress bar
                }, 3000); // 5 seconds delay
            };

            // Handle errors
            xhr.onerror = function() {
                console.error('Request failed');
                // Delay hiding the loading overlay and progress bar
                setTimeout(() => {
                    loadingOverlay.style.display = 'none'; // Hide loading overlay after delay
                    progressBar.style.width = '0%'; // Reset progress bar
                }, 3000); // 5 seconds delay
            };

            // Send the request
            xhr.send();
        });
    }
}