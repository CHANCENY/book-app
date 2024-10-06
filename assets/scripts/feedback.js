// Function to show toast notifications
function showToast(message, type = 'info') {
    // Create a toast container if it doesn't exist
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        document.body.appendChild(toastContainer);
    }

    // Create the toast message element
    let toast = null;
    if(document.querySelector('.toast') && document.querySelector('.toast').textContent.trim() === message) {
        toast = document.querySelector('.toast');
    }
    else {
        toast = document.createElement('div');
    }
    toast.className = `toast ${type}`; // Add type (e.g., 'success', 'error', etc.)
    toast.textContent = message;

    // Append the toast to the container
    toastContainer.appendChild(toast);

    // Remove the toast after 3 seconds
    setTimeout(() => {
        toast.remove();
    }, 3000);
}
