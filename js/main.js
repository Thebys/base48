// Basic JavaScript for the hackerspace website

// Google Translate initialization function
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'cs',
        includedLanguages: 'cs,en,de,uk,pl,es,fr,ja,vi',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        autoDisplay: false
    }, 'google-translate-element');
}

document.addEventListener('DOMContentLoaded', function() {
    // Load Google Translate script
    const translateScript = document.createElement('script');
    translateScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
    translateScript.async = true;
    document.body.appendChild(translateScript);
    
    // Show JS-only elements
    document.querySelectorAll('.js-only').forEach(el => {
        el.style.display = 'flex';
    });
    
    // Theme switching functionality
    const themeToggle = document.querySelector('.theme-toggle');
    const themeIcon = themeToggle.querySelector('i');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    const logo = document.querySelector('.logo');
    
    // Function to update logo based on theme
    function updateLogo(theme) {
        if (theme === 'dark') {
            logo.src = 'img/logo_bw.svg';
        } else {
            logo.src = 'img/logo.svg';
        }
    }
    
    // Check for saved theme preference or use system preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark' || (savedTheme === null && prefersDarkScheme.matches)) {
        document.documentElement.setAttribute('data-theme', 'dark');
        themeIcon.classList.replace('fa-moon', 'fa-sun');
        updateLogo('dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        themeIcon.classList.replace('fa-sun', 'fa-moon');
        updateLogo('light');
    }
    
    // Toggle theme when button is clicked
    themeToggle.addEventListener('click', function() {
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
        
        if (currentTheme === 'light') {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('theme', 'dark');
            themeIcon.classList.replace('fa-moon', 'fa-sun');
            updateLogo('dark');
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
            localStorage.setItem('theme', 'light');
            themeIcon.classList.replace('fa-sun', 'fa-moon');
            updateLogo('light');
        }
    });
    
    // Smooth scrolling for all anchor links (not just from nav)
    const allAnchorLinks = document.querySelectorAll('a[href^="#"]:not([href="#"])');
    
    function smoothScrollToAnchor(e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            // Calculate header height for better offset
            const header = document.querySelector('header');
            const headerHeight = header ? header.offsetHeight : 0;
            const offset = 20; // Additional offset
            const totalOffset = headerHeight + offset;
            
            // Get position with scrollY instead of pageYOffset (which is deprecated)
            const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY - totalOffset;
            
            // Use a custom smooth scroll implementation for better control
            smoothScrollTo(targetPosition, 800);
        }
    }
    
    // Custom smooth scroll implementation
    function smoothScrollTo(targetY, duration) {
        const startY = window.scrollY;
        const difference = targetY - startY;
        const startTime = performance.now();
        
        function step() {
            const currentTime = performance.now();
            const progress = Math.min((currentTime - startTime) / duration, 1);
            
            // Apply easing function for smoother start/end (easeInOutQuad)
            const easeProgress = progress < 0.5 ? 2 * progress * progress : 1 - Math.pow(-2 * progress + 2, 2) / 2;
            
            window.scrollTo(0, startY + difference * easeProgress);
            
            if (progress < 1) {
                requestAnimationFrame(step);
            }
        }
        
        requestAnimationFrame(step);
    }
    
    // Apply to all anchor links
    allAnchorLinks.forEach(link => {
        link.addEventListener('click', smoothScrollToAnchor);
    });
    
    // Current year for footer copyright
    const footerYear = document.querySelector('footer p');
    if (footerYear) {
        const currentYear = new Date().getFullYear();
        footerYear.innerHTML = footerYear.innerHTML.replace('2023', currentYear);
    }
    
    // Simple console message
    console.log('Base48 hackerspace website loaded successfully!');
}); 