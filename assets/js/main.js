/**
 * SIM K3 PLN - Main JavaScript
 * Standardized for professional, optimized performance.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Satukan semua selector di bagian atas (Cache DOM elements)
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav');
    const navLinks = document.querySelectorAll('.nav__link');
    
    // ==========================================
    // MOBILE NAVIGATION TOGGLE
    // ==========================================
    if (menuToggle && navMenu) {
        // Handle klik tombol burger menu
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah event bubbling
            navMenu.classList.toggle('open');
            menuToggle.classList.toggle('active');
        });

        // Close menu otomatis saat salah satu tautan menu diklik
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
                menuToggle.classList.remove('active');
            });
        });

        // Pro Tip: Klik di luar menu mobile akan menutup menu otomatis
        document.addEventListener('click', (e) => {
            if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                navMenu.classList.remove('open');
                menuToggle.classList.remove('active');
            }
        });
    }

    // ==========================================
    // AUTO INTERACTIVE ACTIVE LINK HIGHLIGHT
    // ==========================================
    if (navLinks.length > 0) {
        // Ambil nama file saat ini, berikan fallback 'index.html' jika kosong (akses root domain)
        const currentPath = window.location.pathname.split('/').pop();
        const currentPage = currentPath === '' ? 'index.html' : currentPath;

        navLinks.forEach(link => {
            const linkTarget = link.getAttribute('href');
            
            // Validasi kecocokan halaman saat ini dengan atribut href
            if (linkTarget === currentPage) {
                link.classList.add('active');
                // Tambahkan aksesibilitas ARIA untuk standar front-end modern
                link.setAttribute('aria-current', 'page'); 
            } else {
                link.classList.remove('active');
                link.removeAttribute('aria-current');
            }
        });
    }

    // ==========================================
    // DARK MODE TOGGLE
    // ==========================================
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = themeToggle ? themeToggle.querySelector('i') : null;
    
    if (themeToggle) {
        // Cek preferensi lokal sebelumnya
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            document.documentElement.classList.add('dark-mode');
            if (themeIcon) {
                themeIcon.classList.remove('ri-moon-line');
                themeIcon.classList.add('ri-sun-line');
            }
        }

        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark-mode');
            let theme = 'light';
            
            if (document.documentElement.classList.contains('dark-mode')) {
                theme = 'dark';
                if (themeIcon) {
                    themeIcon.classList.remove('ri-moon-line');
                    themeIcon.classList.add('ri-sun-line');
                }
            } else {
                if (themeIcon) {
                    themeIcon.classList.remove('ri-sun-line');
                    themeIcon.classList.add('ri-moon-line');
                }
            }
            localStorage.setItem('theme', theme);
        });
    }

    // ==========================================
    // LIVE STATS COUNTER ANIMATION
    // ==========================================
    const counters = document.querySelectorAll('.stat-card-premium h3');
    counters.forEach(counter => {
        // Only animate if it's purely a number
        const targetText = counter.innerText;
        const targetNum = parseInt(targetText.replace(/\D/g, ''));
        
        if (!isNaN(targetNum) && targetNum > 0 && targetText.includes('+') === false && targetText.includes('%') === false) {
            let count = 0;
            const updateCount = () => {
                const inc = targetNum / 50; // speed
                if (count < targetNum) {
                    count += inc;
                    counter.innerText = Math.ceil(count);
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = targetText;
                }
            };
            updateCount();
        }
    });

});