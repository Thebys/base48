<?php
$pageTitle = 'Base48 - Brněnský hackerspace';
require 'templates/header.php'; ?>

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
                        <img src="/img/frame/crt_frame_4.webp" alt="CRT Frame" class="crt-frame">
                        <div class="crt-content scanlines">
                            <span class="crt-title">Prostor </span>
                            <img src="/img/screen/hackerspace.webp" alt="Placeholder Content" class="crt-content-image">
                        </div>
                    </div>
                    <div class="crt-screen hide-on-mobile">
                        <img src="/img/frame/crt_frame_1.webp" alt="CRT Frame" class="crt-frame">
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
                    <h3><strong>Base48 hackerspace</strong> je:</h3>
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
                                    <span class="pixel-btn-inner">Členství v Base48</span>
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
                                <img src="/img/frame/crt_frame_3.webp" alt="CRT Frame" class="crt-frame">
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
                            <img src="/img/frame/crt_frame_2.webp" alt="CRT Frame" class="crt-frame">
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
                            <img src="/img/frame/crt_frame_5.webp" alt="CRT Frame" class="crt-frame">
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
                            <img src="/img/frame/crt_frame_2.webp" alt="CRT Frame" class="crt-frame">
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
                        <h3>Členství</h3>
                        <p>I když lidé mohou navštěvovat a&nbsp;využívat hackerspace víceméně bez omezení, pravidelné
                            členství přináší některé výhody, jako je neomezený přístup k&nbsp;fyzické i&nbsp;virtuální
                            infrastruktuře, kterou poskytujeme. Finanční prostředky, které získáváme od&nbsp;našich
                            členů, jsou používány na&nbsp;pokrytí nákladů na&nbsp;provoz hackerspace
                            a&nbsp;na&nbsp;nákup nového vybavení.</p>
                        <p>Měsíční poplatek pro běžné členy je 1000 Kč. Pro studenty 600 Kč. V&nbsp;individuálních
                            případech může rada rozhodnout o&nbsp;snížení nebo prominutí
                            poplatku.
                        </p>

                        <div class="pixel-btn-container">
                            <a href="https://wiki.base48.cz/wiki/Membership" target="_blank"
                                class="pixel-btn pixel-btn-green pixel-btn-animated">
                                <span class="pixel-btn-inner">Chci se stát členem</span>
                            </a>
                        </div>
                    </div>

                    <div class="membership-column">
                        <h3>Podpora</h3>
                        <p>Přijímáme také finanční podporu a&nbsp;dary ve&nbsp;formě vybavení, které by pro nás mohlo
                            být užitečné. Jelikož se snažíme zůstat co nejvíce neutrální, pravděpodobně nebudeme schopni
                            poskytnout mnoho na&nbsp;oplátku. Pro více informací o&nbsp;možnostech podpory nás neváhejte
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
                                    <img src="/img/frame/crt_frame_2.webp" alt="CRT Frame" class="crt-frame">
                                    <div class="crt-content scanlines">
                                        <span class="crt-title" style="color: var(--primary-color);">QR platba</span>
                                        <img src="img/qr_dar_12345.png" alt="QR kód pro darování na bankovní účet"
                                            class="crt-content-image" style="margin-left: -5px; width: 85%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontakt">
            <div class="column">
                <h2>Kontakty & Mapa</h2>

                <div class="contact-columns">
                    <div class="contact-column">
                        <h3>Komunikační kanály</h3>
                        <p>Naše aktuální komunikační kanály najdeš na&nbsp;<a
                                href="https://wiki.base48.cz/wiki/Hackerspace" target="_blank">wiki</a>.</p>

                        <h4>Zdroje</h4>
                        <ul>
                            <li>wiki: <a href="https://wiki.base48.cz" target="_blank">wiki.base48.cz</a></li>
                            <li>mailing listy: <a href="https://lists.base48.cz" target="_blank">lists.base48.cz</a>
                            </li>
                            <li>github: <a href="https://github.com/base48" target="_blank">github.com/base48</a>
                            </li>
                        </ul>

                        <div class="pixel-btn-container">
                            <a href="https://wiki.base48.cz/wiki/Hackerspace" target="_blank" class="pixel-btn">
                                <span class="pixel-btn-inner">Navštívit Wiki</span>
                            </a>
                        </div>
                    </div>

                    <div class="contact-column">
                        <h3>Adresa</h3>
                        <p>Nacházíme se na&nbsp;adrese:</p>
                        <address>
                            Mojmírovo náměstí 17<br>
                            Brno 612 00
                        </address>

                        <p>Naše výhodnější adresa z&nbsp;druhé strany je:</p>
                        <address>
                            Palackého třída 742/82
                        </address>

                        <h4>Doprava</h4>
                        <p>Jsme blízko zastávek tramvaje, autobusu a&nbsp;trolejbusu na&nbsp;Palackého třídě
                            a&nbsp;Husitské ulici:</p>
                        <ul>
                            <li>název zastávky: Husitská</li>
                            <li>tramvaje: 1 a&nbsp;6</li>
                            <li>autobusy: 53, 84 a&nbsp;44</li>
                            <li>trolejbus: 30</li>
                        </ul>

                        <p>Můžete potřebovat upozornit někoho v&nbsp;hackerspace, aby vás pustil dovnitř, brána z
                            Palackého není vždy otevřená a nemáme tam zvonek.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
</div>
<div class="base48-building"><img id="base48-building" src="/img/base48_pixel_3_day.webp" alt="Base48 Building">
</div>
<?php
require 'templates/footer.php';
?>