

// Dark Mode
const darkModeToggle = document.getElementById('dark-mode');
darkModeToggle.addEventListener('change', () => {
    if (darkModeToggle.checked) {
        document.body.style.backgroundColor = '#1a1a2e'; 
        document.body.style.color = '#fff'; 
    } else {
        document.body.style.backgroundColor = '#ffffff'; 
        document.body.style.color = '#000';
    }
});


const hamburger = document.getElementById('hamburger-menu');
const navLinks = document.getElementById('nav-links');

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navLinks.classList.toggle('active');
});





