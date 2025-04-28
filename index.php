<?php
$pageTitle = 'Base48 - Brněnský hackerspace';
require 'templates/header.php';

// Function to get a random frame number
function getRandomFrame()
{
    return rand(1, 5);
}
?>

<!-- Satellite sprite -->
<img src="/img/satellite_pixel_1.webp" alt="Satellite" class="satellite-sprite">
<div class="satellite-popup" id="satellite-popup">
    <span class="close-popup">&times;</span>
    <h3>Proč číslo 48?</h3>
    <p>Protože náš původní prostor byl na&nbsp;ulici Čápkova s&nbsp;orientačním číslem 48 a&nbsp;protože
        s&nbsp;názvem
        base64 bychom měli problém s&nbsp;preferencí vyhledávačů.</p>
</div>

<div class="content-wrapper">
    <main>
        <section id="herobox" class="hero-section">
            <div class="column">
                <h2>Hackerspace Base48 - O&nbsp;nás</h2>
                <div class="crt-grid">
                    <div class="crt-screen">
                        <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                            class="crt-frame">
                        <div class="crt-content scanlines">
                            <span class="crt-title">Prostor </span>
                            <img src="/img/screen/hackerspace.webp" alt="Placeholder Content" class="crt-content-image">
                        </div>
                    </div>
                    <div class="crt-screen hide-on-mobile">
                        <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                            class="crt-frame">
                        <div class="crt-content scanlines">
                            <span class="crt-title">Chill</span>
                            <img src="/img/screen/zahradka_grilovacka.webp" alt="Placeholder Content"
                                class="crt-content-image">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <p>Base48 je komunitně provozovaný fyzický prostor - <strong>hackerspace</strong>, kde se
                        setkávají lidé s&nbsp;různými zájmy,
                        spolupracují na&nbsp;projektech a&nbsp;sdílejí znalosti a&nbsp;zkušenosti.</p>
                    <h3>Base48 hackerspace je:</h3>
                    <div class="container" style="display: flex; flex-direction: row;">
                        <div>
                            <ul>
                                <li>Skupina lidí se&nbsp;společnými zájmy</li>
                                <li>Místo pro&nbsp;setkávání a&nbsp;přednášky</li>
                                <li>Dobře vybavená laboratoř</li>
                                <li>Klub a&nbsp;Third place</li>
                            </ul>
                        </div>
                        <div>
                            <div class="pixel-btn-container" style="display: flex; flex-direction: column;">
                                <a href="#zamereni" class="pixel-btn pixel-btn-gold">
                                    <span class="pixel-btn-inner">Na co se zaměřujeme</span>
                                </a>
                                <a href="#clenstvi" class="pixel-btn pixel-btn-green">
                                    <span class="pixel-btn-inner">členství v Base48</span>
                                </a>
                                <a href="#kontakt" class="pixel-btn pixel-btn-blue">
                                    <span class="pixel-btn-inner">Kontakt & Mapa</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section id="zamereni">
            <div class="column">
                <h2>Zaměření</h2>
                <div class="grid-zamereni">
                    <div class="grid-zamereni-item">
                        <div class="grid-zamereni-item">
                            <div class="info">
                                <h3>3D tisk</h3>
                                <p>V našem 3D koutku tečou plasty proudem. Non-stop. Několik různých tiskáren paralelně
                                    v provozu. K dispozici pro opravy, návrhy, rapidní prototypování. Udržujeme zásobu
                                    komunitního filamentu.</p>
                            </div>
                            <div class="crt-screen">
                                <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                                    class="crt-frame">
                                <div class="crt-content scanlines">
                                    <span class="crt-title">3D tisk </span>
                                    <img src="/img/screen/3d_printing_corner.webp" alt="Placeholder Content"
                                        class="crt-content-image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid-zamereni-item">
                        <div class="info">
                            <h3>Elektro laboratoř</h3>
                            <p>Kvalitní světlo je základ našeho arzenálu, máme mimo jiné osciloskopy, zdroje,
                                mikropájky i horkovzduch. K dispozici stovky druhů běžných součástek a běžné elektro
                                nářadí.
                            </p>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                                class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Elektrolab </span>
                                <img src="/img/screen/elektro_laborator.webp" alt="Placeholder Content"
                                    class="crt-content-image">
                            </div>
                        </div>
                    </div>

                    <div class="grid-zamereni-item">
                        <div class="info">
                            <h3>Dílna</h3>
                            <p>V dílně se dá pracovat se dřevem a kovem. Taky je tu cyklodílna, CNC, hromada nářadí a
                                dokonce i nějaký ten materiál.</p>
                        </div>

                        <div class="crt-screen">
                            <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                                class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Dílna </span>
                                <img src="/img/screen/dilna.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                    </div>

                    <div class="grid-zamereni-item">
                        <div class="info">
                            <h3>Tvůj projekt</h3>
                            <p>Base48 je skvělé místo kde se věnovat širokému spektru DIY projektů a činností. Máme tu
                                vše, co potřebuješ k tomu, abys mohl/a začít se svým novým projektem!</p>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                                class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Tvůj projekt  </span>
                                <img src="/img/screen/otaznik_transparent_left_bg.webp" alt="Placeholder Content"
                                    class="crt-content-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="clenstvi">
            <div class="column">
                <h2>Členství & Podpora</h2>

                <div class="membership-columns">
                    <div class="membership-column">
                        <h3>Členství přináší výhody</h3>
                        <ul>
                            <li>Neomezený přístup k&nbsp;naší fyzické i&nbsp;virtuální infrastruktuře.</li>
                            <li>Možnost použít naše vybavení pro své vlastní projekty.</li>
                            <li>Možnost mít v prostoru svůj úložný prostor.</li>
                            <li>Vstupy na naše i partnerské akce.</li>
                        </ul>
                        </p>
                        <p class="note">
                            Měsíční poplatek pro běžné členy je 1000 Kč. Pro studenty 600 Kč.<br>
                            Finanční prostředky používáme na&nbsp;pokrytí provozních nákladů a&nbsp;na&nbsp;nákup nového
                            vybavení.<br>
                            V&nbsp;individuálních případech může rada rozhodnout o&nbsp;snížení nebo prominutí
                            poplatku.<br>
                            Široká veřejnost může navštěvovat hackerspace prakticky bez omezení, nejlépe
                            v&nbsp;doprovodu existujících členů.

                        </p>

                        <div class="pixel-btn-container" style="margin: 40px 0 60px 0;">
                            <a href="https://wiki.base48.cz/wiki/Membership" target="_blank"
                                class="pixel-btn pixel-btn-green pixel-btn-animated">
                                <span class="pixel-btn-inner">Chci se stát členem</span>
                            </a>
                            <a href="https://m.base48.cz/auth/login" target="_blank" class="pixel-btn pixel-btn-blue">
                                <span class="pixel-btn-inner">Členský portál</span>
                            </a>
                        </div>
                    </div>

                    <div class="membership-column">
                        <h3>Podpora</h3>
                        <p>Přijímáme finanční a materiální podporu (hodnotné vybavení, elektro, 3D tisk, dílna,
                            ...).<br>
                            Zakládáme si na neutralitě a nezaručujeme žádnou protislužbu nebo protiplnění.<br>
                            Pro více informací o&nbsp;možnostech podpory nás neváhejte
                            kontaktovat.</p>

                        <div class="container" style="padding: 20px;">
                            <div class="container" style="flex-direction: column; justify-content: flex-start;">
                                <h3>Způsoby podpory</h3>
                                <ul>
                                    <li>Finanční dary</li>
                                    <li>Darování vybavení</li>
                                    <li>Dobrovolnictví</li>
                                    <li>Sdílení znalostí</li>
                                </ul>
                                <div class="pixel-btn-container">
                                    <a href="#kontakt" class="pixel-btn pixel-btn-gold">
                                        <span class="pixel-btn-inner">Podpořit Base48</span>
                                    </a>
                                </div>
                            </div>
                            <div class="container" style="align-items: center;">
                                <div class="crt-screen" style="width: 100%;">
                                    <img src="/img/frame/crt_frame_<?php echo getRandomFrame(); ?>.webp" alt="CRT Frame"
                                        class="crt-frame">
                                    <div class="crt-content scanlines">
                                        <span class="crt-title" style="color: var(--primary-color);">QR platba</span>
                                        <img src="img/qr_dar_12345.png" alt="QR kód pro darování na bankovní účet"
                                            class="crt-content-image"
                                            style="margin-left: 20px; margin-top:-40px; width: 65%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontakt">
            <div class="column contact-grid">
                <h2>Odkazy a Kontakty</h2>

                <div class="contact-info-grid">
                    <div class="contact-card communication">
                        <h3>Komunikační kanály</h3>
                        <div class="contact-links">
                            <a href="https://wiki.base48.cz" target="_blank" class="contact-link">
                                <i class="fas fa-book"></i>
                                <span>wiki.base48.cz</span>
                            </a>
                            <a href="https://lists.base48.cz" target="_blank" class="contact-link">
                                <i class="fas fa-envelope"></i>
                                <span>lists.base48.cz</span>
                            </a>
                            <a href="https://github.com/base48" target="_blank" class="contact-link">
                                <i class="fab fa-github"></i>
                                <span>github.com/base48</span>
                            </a>
                            <a href="https://www.facebook.com/Base48.cz/" target="_blank" class="contact-link">
                                <i class="fab fa-facebook"></i>
                                <span>facebook.com/Base48.cz</span>
                            </a>
                            <a href="https://www.instagram.com/base48cz/" target="_blank" class="contact-link">
                                <i class="fab fa-instagram"></i>
                                <span>instagram.com/base48cz</span>
                            </a>
                            <a href="https://www.youtube.com/channel/UCyBFShxrgO1QkRqs7EEM04A" target="_blank"
                                class="contact-link">
                                <i class="fab fa-youtube"></i>
                                <span>youtube.com/channel/base48</span>
                            </a>
                        </div>

                        <p class="note">Naše další komunikační kanály a aktuální informace najdeš na <a
                                href="https://wiki.base48.cz/wiki/Hackerspace" target="_blank">wiki</a>.</p>
                        <div class="pixel-btn-container">
                            <a href="https://wiki.base48.cz/wiki/Hackerspace" target="_blank" class="pixel-btn">
                                <span class="pixel-btn-inner">Navštívit Wiki</span>
                            </a>
                        </div>
                    </div>

                    <div class="contact-card location">
                        <h3>Adresa</h3>
                        <div class="addresses" style="display: flex; flex-direction: row; gap: 20px;">
                            <div class="address-block primary">
                                <address>
                                    Mojmírovo náměstí&nbsp;17<br>
                                    Brno 612&nbsp;00
                                </address>
                            </div>
                            <div class="address-block secondary">
                                <address class="">
                                    Palackého třída 742/82<br>
                                    (vchod z&nbsp;Palackého třídy.)
                                </address>

                            </div>
                        </div>
                        <p class="note" style="margin-top: 10px;">
                            Pro průchod z&nbsp;Palackého může být potřeba upozornit někoho v&nbsp;hackerspace,
                            aby
                            přišel otevřít. Brána z&nbsp;Palackého není vždy otevřená a&nbsp;nemáme tam zvonek.
                        </p>
                        <div class="transport-info">
                            <h4>Doprava 🐉</h4>
                            <div class="transport-grid" style="font-size: .9rem;">
                                <div class="transport-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Husitská,<br> Slovanské náměstí</span>
                                </div>
                                <div class="transport-item">
                                    <i class="fas fa-train"></i>
                                    <span>Šaliny:<br> 1, 6</span>
                                </div>
                                <div class="transport-item">
                                    <i class="fas fa-bus"></i>
                                    <span>Autobusy:<br> 53, 67, 44, 84</span>
                                </div>
                                <div class="transport-item">
                                    <i class="fas fa-bus"></i>
                                    <span>Trolejbusy:<br> 30, 32</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-card" style="align-items: center;">
                    <h3>Mapy</h3>
                    <div class="pixel-btn-container">
                        <a href="https://mapy.cz/s/bosesamuva" target="_blank" class="pixel-btn pixel-btn-green">
                            <span class="pixel-btn-inner">Mapy.cz</span>
                        </a>
                        <a href="https://www.google.com/maps/dir//Mojm%C3%ADrovo+n%C3%A1m.+17,+612+00+Brno-Kr%C3%A1lovo+Pole/@49.2243066,16.5939131,343m/data=!3m1!1e3!4m8!4m7!1m0!1m5!1m1!1s0x47129440c7cff175:0x746297c25f280f66!2m2!1d16.595491!2d49.2242141?hl=en&entry=ttu&g_ep=EgoyMDI1MDQyMy4wIKXMDSoASAFQAw%3D%3D"
                            target="_blank" class="pixel-btn pixel-btn-blue">
                            <span class="pixel-btn-inner">Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
<?php
require 'templates/footer.php';
?>