// Get elements
const menuBtn = document.getElementById('menu-btn');
const navDrawer = document.getElementById('nav-drawer');
const overlay = document.getElementById('overlay');

// Open the navigation drawer when menu is clicked
menuBtn.addEventListener('click', () => {
    navDrawer.classList.add('open');
    overlay.classList.add('active');
});

// Close the drawer when overlay is clicked
overlay.addEventListener('click', () => {
    navDrawer.classList.remove('open');
    overlay.classList.remove('active');
});
