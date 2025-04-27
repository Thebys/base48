<?php
$pageTitle = '404 - Stránka nenalezena | Base48';
require 'templates/header.php';
// Note: The standard header includes navigation, which wasn't in the original 404.
// This might need adjustment based on desired final appearance.
?>
<style>
    /* Keep 404-specific styles here */
    .error-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 1rem;
        max-width: 90vw;
        margin: 0 auto;
        overflow: visible;
    }

    .error-title {
        font-family: 'Press Start 2P', cursive;
        margin-bottom: 2rem;
        font-size: 1.95rem;
        text-shadow: 0 0 10px var(--text-glow-color);
        white-space: nowrap;
        overflow: hidden;
        border-right: 2px solid var(--accent-color);
        width: 0;
        animation: typing 3.5s steps(40, end) 1s forwards, blink-caret 0.75s step-end infinite;
        margin: 0 auto 2rem;
    }

    .satellite-container {
        position: relative;
        width: 100vw;
        height: 300px;
        margin: 2rem 0;
        overflow: visible;
        opacity: 1;
    }

    .error-satellite {
        position: absolute;
        width: 150px;
        height: 150px;
        animation: errorSatelliteFly 96s linear infinite;
        filter: drop-shadow(0 0 10px var(--accent-color));
        cursor: pointer;
        z-index: 100;
        transform-origin: center center;
    }

    @keyframes errorSatelliteFly {
        0% {
            left: 0vw;
            top: 50px;
            transform: scale(0.8) rotate(-15deg);
            opacity: 0;
        }

        4% {
            opacity: 1;
            transform: scale(0.8) rotate(-12deg);
            left: 10vw;
        }

        20% {
            left: 30vw;
            top: 70px;
            transform: scale(1.2) rotate(0deg);
        }

        35% {
            left: 55vw;
            top: 110px;
            transform: scale(2.0) rotate(5deg);
        }

        50% {
            left: 75vw;
            top: 150px;
            transform: scale(3) rotate(0deg);
        }

        65% {
            left: 95vw;
            top: 110px;
            transform: scale(2.0) rotate(-5deg);
        }

        80% {
            left: 120vw;
            top: 70px;
            transform: scale(1.2) rotate(0deg);
        }

        96% {
            opacity: 1;
            transform: scale(0.8) rotate(12deg);
            left: 140vw;
        }

        100% {
            left: 150vw;
            top: 50px;
            transform: scale(0.8) rotate(15deg);
            opacity: 0;
        }
    }

    .typing-text {
        font-family: monospace;
        white-space: nowrap;
        overflow: hidden;
        border-right: 2px solid var(--accent-color);
        width: 0;
        animation: typing 3.5s steps(40, end) 6s forwards, blink-caret 0.75s step-end infinite;
        margin: 0 auto;
        max-width: 90%;
        opacity: 0;
    }

    @keyframes typing {
        0% {
            width: 0;
            opacity: 1;
        }

        100% {
            width: 100%;
            opacity: 1;
        }
    }

    @keyframes blink-caret {

        from,
        to {
            border-color: transparent
        }

        50% {
            border-color: var(--accent-color)
        }
    }

    .home-link {
        margin-top: 2rem;
        opacity: 0;
        animation: fadeIn 1s ease-in 9.5s forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @media (max-width: 600px) {
        .error-title {
            white-space: normal;
            font-size: 1.5rem;
            border-right: none;
            width: auto;
            animation: none;
            margin-bottom: 1rem;
            opacity: 1;
        }

        .typing-text {
            white-space: normal;
            border-right: none;
            width: auto;
            animation: fadeIn 1s ease-in 1s forwards;
            opacity: 0;
        }

        /* Adjust header logo size on small screens if needed */
        header .logo {
             /* max-width: 150px; /* Example adjustment */
        }

        .satellite-container {
            height: 200px;
             /* Removed transform as it might conflict */
        }

        .error-satellite {
            width: 100px;
            height: 100px;
        }
    }
</style>

    <div class="content-wrapper">
        <div class="error-container">
            <h1 class="error-title">Chyba 404 - Vesmír nenalezen</h1>
        </div>
    </div>
    <div class="satellite-container">
        <img src="/img/satellite_pixel_1.webp" alt="Satellite" class="error-satellite" id="error-satellite">
    </div>
    <div class="content-wrapper">
        <div class="error-container">
            <p class="typing-text">Houstone, máme problém. Stránka, kterou hledáme, se ztratila ve vesmíru.</p>
            <div class="pixel-btn-container home-link">
                <a href="/index.php" class="pixel-btn pixel-btn-blue">
                    <span class="pixel-btn-inner">Zpět na domovskou stránku</span>
                </a>
            </div>
        </div>
    </div>

    <div class="satellite-popup" id="satellite-popup">
        <span class="close-popup">&times;</span>
        <h3>Cíl nenalezen!</h3>
        <p>Náš satelit zachytil signál s&nbsp;požadavkem, ale&nbsp;hledaný cíl se&nbsp;nepodařilo lokalizovat. Zdravím
            pozemšťany, hack the planet! Přepínám.</p>
    </div>

    <!-- Specific JS for 404 page -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
             // Standard theme switching and logo update logic is now mostly handled by main.js,
             // loaded via footer.php (or potentially header.php if moved).
             // We only need 404-specific logic here.

            // Update copyright year (though footer is hidden by default)
            const currentYearElement = document.getElementById('current-year');
            if (currentYearElement) {
                currentYearElement.textContent = new Date().getFullYear();
            }

            // Satellite popup functionality (specific to 404 animation)
            const satellite = document.querySelector('.error-satellite');
            const satellitePopup = document.getElementById('satellite-popup');
            const closePopup = document.querySelector('.close-popup');
            const logo = document.querySelector('header .logo'); // Get logo from header

            // Function to update logo based on theme (needed if main.js isn't loaded)
            function updateLogo(theme) {
                 if (logo) { // Check if logo exists
                    if (theme === 'dark') {
                        logo.src = '/img/logo_bw.svg';
                    } else {
                        logo.src = '/img/logo.svg';
                    }
                }
            }

            // Initial logo update based on theme already set on <html> tag
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            updateLogo(currentTheme);

             // Event listener for theme changes (if main.js doesn't handle it)
             // This assumes theme changes are broadcasted or detectable somehow
             // For simplicity, we rely on the initial theme set by PHP

            // Show popup when satellite is clicked
            if (satellite && satellitePopup && closePopup) {
                // Add a visible indicator that satellite is clickable
                satellite.title = "Klikni pro informaci";

                satellite.addEventListener('click', function (e) {
                    satellite.style.animationPlayState = 'paused';
                    satellitePopup.classList.add('show');

                    // Position popup near satellite
                    const satelliteRect = satellite.getBoundingClientRect();
                    // Basic positioning - might need refinement
                     let popupTop = window.scrollY + satelliteRect.bottom + 10;
                     let popupLeft = window.scrollX + satelliteRect.left + (satelliteRect.width / 2) - (satellitePopup.offsetWidth / 2);

                    // Ensure popup stays within viewport
                     popupLeft = Math.max(10, Math.min(popupLeft, window.innerWidth - satellitePopup.offsetWidth - 10));
                     popupTop = Math.max(10, popupTop);

                    satellitePopup.style.position = 'absolute';
                    satellitePopup.style.top = popupTop + 'px';
                    satellitePopup.style.left = popupLeft + 'px';

                    e.stopPropagation();
                });

                // Close popup when close button is clicked
                closePopup.addEventListener('click', function (e) {
                    satellitePopup.classList.remove('show');
                    satellite.style.animationPlayState = 'running';
                    e.stopPropagation();
                });

                // Close popup when clicking anywhere else
                document.addEventListener('click', function (e) {
                    if (satellitePopup.classList.contains('show') &&
                        !satellitePopup.contains(e.target) &&
                        e.target !== satellite) {
                        satellitePopup.classList.remove('show');
                        satellite.style.animationPlayState = 'running';
                    }
                });

                // Close popup when ESC key is pressed
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape' && satellitePopup.classList.contains('show')) {
                        satellitePopup.classList.remove('show');
                        satellite.style.animationPlayState = 'running';
                    }
                });
            }
            else {
                console.error('Satellite or popup elements not found for 404 page.');
            }
        });
    </script>

</body>
</html>