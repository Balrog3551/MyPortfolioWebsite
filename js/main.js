document.addEventListener('DOMContentLoaded', () => {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarContainer = document.querySelector('.navbar-container');

    if (navbarToggler && navbarContainer) {
        navbarToggler.addEventListener('click', () => {
            navbarContainer.classList.toggle('active');
        });
    }

    const themeCheckbox = document.getElementById('theme-checkbox');
    const body = document.body;

    const currentTheme = localStorage.getItem('theme');
    if (currentTheme) {
        body.classList.add(currentTheme);
        if (currentTheme === 'dark-theme') {
            themeCheckbox.checked = true;
        }
    }

    themeCheckbox.addEventListener('change', () => {
        if (themeCheckbox.checked) {
            body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark-theme');
        } else {
            body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light-theme');
        }
    });
});

const langToggle = document.getElementById('lang-toggle');

if (langToggle) {
    langToggle.addEventListener('click', () => {
        const currentButtonText = langToggle.innerText.trim();
        const newLang = (currentButtonText === 'EN') ? 'en' : 'tr';

        fetch('/api/set_language.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ lang: newLang }),
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                location.reload();
            } else {
                console.error('Dil değiştirilemedi:', data.message);
            }
        })
        .catch(error => {
            console.error('Fetch Hatası:', error);
        });
    });
}