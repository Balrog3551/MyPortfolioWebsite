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

const langToggle = document.getElementById('lang-toggle');

if (langToggle) {
    langToggle.addEventListener('click', () => {
        const currentButtonText = langToggle.innerText.trim();
        const newLang = (currentButtonText === 'EN') ? 'en' : 'tr';


        console.log("Sunucuya gönderilecek yeni dil:", newLang);

        fetch('/api/set_language.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ lang: newLang }),
        })
        .then(response => {
            if (!response.ok) {
                console.error("Ağ yanıtı sorunlu. Durum:", response.status);
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