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
    
    // Satellite popup functionality
    const satellite = document.querySelector('.satellite-sprite');
    const satellitePopup = document.getElementById('satellite-popup');
    const overlay = document.getElementById('satellite-overlay');
    const closePopup = document.querySelector('.close-popup');
    
    console.log('Satellite elements:', { 
        satellite: satellite, 
        popup: satellitePopup, 
        overlay: overlay, 
        closeBtn: closePopup 
    });
    
    // Show popup when satellite is clicked
    if (satellite && satellitePopup) {
        // Add a visible indicator that satellite is clickable
        satellite.title = "Klikni pro informaci";
        
        // Function to update satellite size based on position
        function updateSatelliteSize() {
            if (satellite) {
                // Get viewport width
                const viewportWidth = window.innerWidth;
                
                // Get satellite's horizontal position
                const satelliteRect = satellite.getBoundingClientRect();
                const satelliteCenter = satelliteRect.left + (satelliteRect.width / 2);
                
                // Calculate distance from center as a percentage (0 = center, 1 = edge)
                const centerX = viewportWidth / 2;
                const distanceFromCenter = Math.abs(satelliteCenter - centerX) / centerX;
                
                // Calculate scale based on position:
                // - At edge (distanceFromCenter = 1): scale = 0.8
                // - At center (distanceFromCenter = 0): scale = 1.5
                const scale = 1.5 - (distanceFromCenter * 0.7);
                
                // Get current satellite animation position to determine rotation
                // Change rotation based on position in animation cycle
                const rightPosition = parseFloat(window.getComputedStyle(satellite).right);
                const rightPercentage = rightPosition / viewportWidth;
                const normalizedPosition = 1 - (rightPosition % viewportWidth) / viewportWidth;
                
                // Calculate rotation angle (-15 to 15 degrees)
                let rotation = 0;
                if (normalizedPosition < 0.25) {
                    rotation = 15 - normalizedPosition * 120; // 15 to -15
                } else if (normalizedPosition < 0.5) {
                    rotation = -15 + (normalizedPosition - 0.25) * 120; // -15 to 15
                } else if (normalizedPosition < 0.75) {
                    rotation = 15 - (normalizedPosition - 0.5) * 120; // 15 to -15
                } else {
                    rotation = -15 + (normalizedPosition - 0.75) * 120; // -15 to 15
                }
                
                // Apply the scale and rotation
                satellite.style.transform = `scale(${scale}) rotate(${rotation}deg)`;
            }
            
            // Request next animation frame if not showing popup
            if (!satellitePopup.classList.contains('show')) {
                requestAnimationFrame(updateSatelliteSize);
            }
        }
        
        // Start updating satellite size
        updateSatelliteSize();
        
        // Function to update popup position to follow satellite
        function updatePopupPosition() {
            if (satellitePopup.classList.contains('show')) {
                // Get satellite position
                const satelliteRect = satellite.getBoundingClientRect();
                
                // Position popup relative to satellite's document position
                // Place it at the center-bottom of the satellite
                const satelliteCenter = satelliteRect.left + (satelliteRect.width / 2);
                
                // Update popup position
                satellitePopup.style.top = (window.scrollY + satelliteRect.bottom) + 'px';
                satellitePopup.style.left = (window.scrollX + satelliteCenter) + 'px';
                
                // Request next animation frame
                requestAnimationFrame(updatePopupPosition);
            }
        }
        
        satellite.addEventListener('click', function(e) {
            console.log('Satellite clicked!');
            satellitePopup.classList.add('show');
            
            // Attach popup to satellite
            satellitePopup.style.position = 'absolute';
            updatePopupPosition();
            
            // Pause satellite animation and size updates
            satellite.style.animationPlayState = 'paused';
            
            e.stopPropagation(); // Prevent event bubbling
        });
        
        // Close popup when close button is clicked
        closePopup.addEventListener('click', function(e) {
            console.log('Close button clicked!');
            satellitePopup.classList.remove('show');
            
            // Resume satellite animation and size updates
            satellite.style.animationPlayState = 'running';
            updateSatelliteSize(); // Restart size updates
            
            e.stopPropagation(); // Prevent event bubbling
        });
        
        // Close popup when clicking anywhere else
        document.addEventListener('click', function(e) {
            if (satellitePopup.classList.contains('show') && 
                !satellitePopup.contains(e.target) && 
                e.target !== satellite) {
                console.log('Document clicked - closing popup');
                satellitePopup.classList.remove('show');
                
                // Resume satellite animation and size updates
                satellite.style.animationPlayState = 'running';
                updateSatelliteSize(); // Restart size updates
            }
        });
        
        // Close popup when ESC key is pressed
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && satellitePopup.classList.contains('show')) {
                console.log('ESC key pressed!');
                satellitePopup.classList.remove('show');
                
                // Resume satellite animation and size updates
                satellite.style.animationPlayState = 'running';
                updateSatelliteSize(); // Restart size updates
            }
        });
        
        // Add alternate way to trigger popup for testing
        document.addEventListener('keydown', function(e) {
            if (e.key === 's' && !satellitePopup.classList.contains('show')) {
                console.log('S key pressed - showing popup!');
                satellitePopup.classList.add('show');
                
                // Attach popup to satellite
                satellitePopup.style.position = 'absolute';
                updatePopupPosition();
                
                // Pause satellite animation
                satellite.style.animationPlayState = 'paused';
            }
        });
    } else {
        console.error('Missing satellite elements:', { 
            satellite: !!satellite, 
            popup: !!satellitePopup
        });
    }
    
    // Simple console message
    console.log('Base48 hackerspace website loaded successfully!');
}); 