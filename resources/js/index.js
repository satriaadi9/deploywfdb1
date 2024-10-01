document.addEventListener('DOMContentLoaded', function () {
    
    const themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {
        document.documentElement.classList.toggle('dark');
    });
});