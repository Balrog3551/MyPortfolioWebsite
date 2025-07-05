document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        body.classList.add(currentTheme);
        if (currentTheme === 'dark-theme') {
            themeToggle.innerHTML = '☀️';
        } else {
            themeToggle.innerHTML = '🌙';
        }
    }

    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
        let theme = 'light-theme';
        if (body.classList.contains('dark-theme')) {
            theme = 'dark-theme';
            themeToggle.innerHTML = '☀️';
        } else {
            themeToggle.innerHTML = '🌙';
        }
        localStorage.setItem('theme', theme);
    });
});