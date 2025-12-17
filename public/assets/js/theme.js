(function () {
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('theme-toggle');
        if (!toggle) return;
        toggle.addEventListener('click', () => {
            const next = toggle.dataset.nextTheme || 'old';
            document.cookie = `theme=${next}; path=/; max-age=${60 * 60 * 24 * 365}`;
            window.location.reload();
        });
    });
})();
