<?php
$pageTitle = 'Base48 - Brněnský hackerspace';
require 'templates/header.php';
?>

    <!-- Satellite sprite -->
    <img src="/img/satellite_pixel_1.webp" alt="Satellite" class="satellite-sprite">
    <div class="satellite-popup" id="satellite-popup">
        <span class="close-popup">&times;</span>
        <h3>Proč číslo 48?</h3>
        <p>Protože náš původní prostor byl na ulici Čápkova s&nbsp;orientačním číslem 48 a&nbsp;protože s&nbsp;názvem
            base64 bychom měli problém s&nbsp;preferencí vyhledávačů.</p>
    </div>

    <div class="content-wrapper">
        <main>
            <section id="herobox" class="hero-section">
                <div class="column">                    
                        <h2>O nás</h2>
                        <p>Base48 je komunitně provozovaný fyzický prostor - <strong>hackerspace</strong>, kde se
                            setkávají lidé s&nbsp;různými zájmy,
                            spolupracují na&nbsp;projektech a&nbsp;sdílejí znalosti a&nbsp;zkušenosti.</p>
                        <p>Náš hackerspace je:</p>
                        <ul>
                            <li>Skupina lidí se&nbsp;společnými zájmy</li>
                            <li>Místo pro&nbsp;setkávání a&nbsp;přednášky</li>
                            <li>Dobře vybavená laboratoř</li>
                            <li>Klub a&nbsp;Third place</li>
                        </ul>
                        <div class="pixel-btn-container">
                            <a href="#membership" class="pixel-btn pixel-btn-blue">
                                <span class="pixel-btn-inner">Informace o členství</span>
                            </a>
                        </div>                                    
                </div>

                <h2>Zaměření</h2>
                <div class="crt-grid">
                    <div class="crt-row">
                        <div class="crt-screen">
                            <img src="/img/crt_frame_3.webp" alt="CRT Frame" class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">3D tisk </span>
                                <img src="/img/3d_printing_corner.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/crt_frame_2.webp" alt="CRT Frame" class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Elektrolab </span>
                                <img src="/img/elektro_laborator.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/crt_frame_1.webp" alt="CRT Frame" class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Chill</span>
                                <img src="/img/zahradka_grilovacka.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                    </div>
                    <div class="crt-row">
                        <div class="crt-screen">
                            <img src="/img/crt_frame_4.webp" alt="CRT Frame" class="crt-frame">
                             <div class="crt-content scanlines">
                                <span class="crt-title">Prostor </span>
                                <img src="/img/hackerspace.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/crt_frame_5.webp" alt="CRT Frame" class="crt-frame">
                            <div class="crt-content scanlines">
                                <span class="crt-title">Dílna </span>
                                <img src="/img/dilna.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                        <div class="crt-screen">
                            <img src="/img/crt_frame_2.webp" alt="CRT Frame" class="crt-frame">
                             <div class="crt-content scanlines">
                                <span class="crt-title">Tvůj projekt  </span>
                                <img src="/img/otaznik_transparent_left.webp" alt="Placeholder Content" class="crt-content-image">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="membership">
                <h2>Členství & Podpora</h2>

                <div class="membership-columns">
                    <div class="membership-column">
                        <h3>Členství</h3>
                        <p>I když lidé mohou navštěvovat a&nbsp;využívat hackerspace víceméně bez omezení, pravidelné
                            členství
                            přináší některé výhody, jako je neomezený přístup k&nbsp;fyzické i&nbsp;virtuální
                            infrastruktuře, kterou
                            poskytujeme. Finanční prostředky, které získáváme od&nbsp;našich členů, jsou používány
                            na&nbsp;pokrytí nákladů
                            na&nbsp;provoz hackerspace a&nbsp;na&nbsp;nákup nového vybavení.</p>
                        <p>Měsíční poplatek pro běžné členy je 1000 Kč. Pro studenty 600 Kč.</p>
                        <p>V&nbsp;individuálních případech může rada rozhodnout o&nbsp;snížení nebo prominutí poplatku.
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
                            být užitečné. Jelikož se
                            snažíme zůstat co nejvíce neutrální, pravděpodobně nebudeme schopni poskytnout mnoho
                            na&nbsp;oplátku.</p>

                        <h4>Způsoby podpory</h4>
                        <ul>
                            <li>Finanční dary</li>
                            <li>Darování vybavení</li>
                            <li>Dobrovolnictví</li>
                            <li>Sdílení znalostí</li>
                        </ul>

                        <p>Pro více informací o&nbsp;možnostech podpory nás neváhejte kontaktovat.</p>

                        <div class="pixel-btn-container">
                            <a href="#contact" class="pixel-btn pixel-btn-gold">
                                <span class="pixel-btn-inner">Chci podpořit Base48</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
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
                            <li>github: <a href="https://github.com/base48" target="_blank">github.com/base48</a></li>
                        </ul>

                        <div class="pixel-btn-container">
                            <a href="https://wiki.base48.cz/wiki/Hackerspace" target="_blank" class="pixel-btn">
                                <span class="pixel-btn-inner">Navštiv naši Wiki</span>
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

                        <p>Budete potřebovat upozornit někoho v&nbsp;hackerspace, aby vás pustil dovnitř
                            z&nbsp;Palackého tř., protože
                            zatím nemáme zvonek.</p>

                        <h3>Mapa</h3>
                        <div class="map-container">
                            <a target="_blank" href="https://mapy.cz/s/mezekuzahu"><img src="/img/base48_kudy_pixel.webp"
                                    alt="Mapa k Base48" class="location-map"></a>
                        </div>
                    </div>
                </div>
            </section>

        </main>
    </div>
    <div class="base48-building"><img id="base48-building" src="/img/base48_pixel_3_day.webp" alt="Base48 Building"></div>
<?php
require 'templates/footer.php';
?>