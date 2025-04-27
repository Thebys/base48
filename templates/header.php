<?php
// Determine theme based on cookie or system preference (simplified for initial setup)
// This logic could be more robust in a real application
$theme = $_COOKIE['theme'] ?? (isset($_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME']) && $_SERVER['HTTP_SEC_CH_PREFERS_COLOR_SCHEME'] === 'dark' ? 'dark' : 'light');
?>
<!DOCTYPE html>
<html lang="cs" data-theme="<?php echo htmlspecialchars($theme); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Base48'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script>
        // Immediately set theme based on determined value to prevent FOUC
        document.documentElement.setAttribute('data-theme', '<?php echo htmlspecialchars($theme); ?>');
    </script>
</head>

<body>
    <header>
        <div class="header-left">
            <div class="logo-container">
                 <a href="/">
                    <img src="/img/logo/logo.svg" alt="Base48 Logo" class="logo">
                 </a>
            </div>
             <!-- Hide H1 visually but keep for SEO/Accessibility -->
            <h1 style="position: absolute; width: 1px; height: 1px; margin: -1px; padding: 0; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0;">Base48 - Brněnský hackerspace</h1>
        </div>
        <nav>
            <ul>
                <li><a href="/#herobox">O nás</a></li>
                <li><a href="/#membership">Členství a&nbsp;podpora</a></li>
                <li><a href="/#contact">Kontakt &&nbsp;Mapa</a></li>
            </ul>
        </nav>
    </header>

    <!-- Theme toggle button -->
    <button class="theme-toggle js-only" aria-label="Přepnout téma" title="Přepnout téma">
        <i class="fas <?php echo $theme === 'dark' ? 'fa-sun' : 'fa-moon'; ?>"></i>
    </button>

</body>
</html> 