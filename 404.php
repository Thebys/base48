<?php
$pageTitle = '404 - Stránka nenalezena | Base48';
require 'templates/header.php';
// Note: The standard header includes navigation, which wasn't in the original 404.
// This might need adjustment based on desired final appearance.
?>

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