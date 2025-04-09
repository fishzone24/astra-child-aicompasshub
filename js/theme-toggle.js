// AICompassHub Dark Mode Toggle

(function() {
    const themeToggleBtn = document.getElementById('dark-mode-toggle');
    const currentTheme = localStorage.getItem('theme');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

    // Function to apply the theme
    function applyTheme(theme) {
        if (theme === 'dark') {
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
            if(themeToggleBtn) themeToggleBtn.setAttribute('aria-pressed', 'true');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('theme', 'light');
            if(themeToggleBtn) themeToggleBtn.setAttribute('aria-pressed', 'false');
        }
    }

    // Apply initial theme based on localStorage or system preference
    if (currentTheme === 'dark') {
        applyTheme('dark');
    } else if (currentTheme === 'light') {
        applyTheme('light');
    } else if (prefersDarkScheme.matches) {
        applyTheme('dark');
    } else {
        applyTheme('light'); // Default to light
    }

    // Add event listener to the button
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const newTheme = document.body.classList.contains('dark-mode') ? 'light' : 'dark';
            applyTheme(newTheme);
        });
    }

    // Listen for changes in system preference
    prefersDarkScheme.addEventListener('change', (e) => {
        // Only change if no explicit preference is stored
        if (!localStorage.getItem('theme')) {
            applyTheme(e.matches ? 'dark' : 'light');
        }
    });

})(); 