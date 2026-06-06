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
});