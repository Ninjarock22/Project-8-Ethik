<?php

require_once "../authsystem/config.php";

$stmt = $db->prepare("SELECT COUNT(*) FROM users");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$count = $row[0];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../images/icons/logo3.ico">
    <title>Egoinfinitura</title>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../public/Stylesheet.css">
</head>
<body>
    <div class="terms-overlay" id="termsOverlay">
        <div class="terms-box">
        <h3>1. Einführung</h3>
    <p>Willkommen bei Egoinfinitura. Durch die Nutzung unserer Website stimmen Sie den folgenden Nutzungsbedingungen und der Datenschutzrichtlinie zu. Bitte lesen Sie diese sorgfältig durch, bevor Sie fortfahren.</p>
    
    <h3>2. Nutzung der Website</h3>
    <ul style="color: #C4A484;">
      <li>Nutzen Sie die Website nur für rechtmäßige Zwecke.</li>
      <li>Vermeiden Sie Schäden oder Störungen beim Zugriff auf die Website.</li>
      <li>Missbrauchen, schädigen oder versuchen Sie keinen unbefugten Zugriff.</li>
    </ul>

    <h3>3. Geistiges Eigentum</h3>
    <p>Alle Inhalte, Logos und Designs sind Eigentum von Egoinfinitura. Die Vervielfältigung oder Verbreitung ohne Genehmigung ist untersagt.</p>

    <h3>4. Konto und persönliche Daten</h3>
    <p>Das Erstellen eines Kontos kann Ihren Namen und/oder Ihre E-Mail-Adresse erfordern. Diese Daten werden nur für den Kontozugang und die Sicherheit verwendet. Sie werden niemals verkauft oder weitergegeben und sind nur für Administratoren zugänglich.</p>

    <h3>5. Datenschutz im Forum und bei Zielen</h3>
    <p>Forennachrichten sind anonym und können nicht auf einzelne Benutzer zurückgeführt werden. Sie können jedoch von Administratoren aus Sicherheits- und rechtlichen Gründen eingesehen werden. Einträge auf der Zielseite sind privat und nur für Sie sichtbar.</p>

    <h3>6. Cookies</h3>
    <p>Wir verwenden zwei wesentliche Cookies:
      <ul style="color: #C4A484;">
        <li>Eines, um zu speichern, ob Sie diese Bedingungen akzeptiert haben.</li>
        <li>Ein weiteres, um Sie während der Nutzung Ihres Kontos eingeloggt zu halten.</li>
      </ul>
      Diese Cookies verfolgen oder sammeln keine zusätzlichen Daten.
    </p>

    <h3>7. Datenerhebung und -nutzung</h3>
    <p>Wir erfassen nur die Informationen, die Sie freiwillig während der Registrierung angeben (z. B. Name oder E-Mail-Adresse). Es erfolgt keine zusätzliche Verfolgung oder Datenerhebung durch Dritte auf unserer Website.</p>

    <h3>8. Datenzugriff und -sicherheit</h3>
    <p>Ihre Daten sind nur für autorisierte Administratoren aus Sicherheitsgründen zugänglich. Wir setzen Schutzmaßnahmen ein, um Ihre Informationen zu sichern.</p>

    <h3>9. Ihre Rechte</h3>
    <p>Sie können verlangen, auf Ihre persönlichen Daten zuzugreifen, diese zu korrigieren oder zu löschen, indem Sie <a style="color: #C4A484;" href="mailto:behj8622@gmail.com">behj8622@gmail.com</a> kontaktieren.</p>

    <h3>10. Änderungen dieser Bedingungen</h3>
    <p>Wir können diese Vereinbarung im Laufe der Zeit aktualisieren. Die fortgesetzte Nutzung unserer Website gilt als Zustimmung zu zukünftigen Änderungen.</p>

    
            <h3>Kontaktieren Sie uns</h3>
            <p>Wenn Sie Fragen zu diesen Bedingungen haben, kontaktieren Sie uns bitte unter behj8622@gmail.com.</p>
            <button class="accept-button" onclick="acceptTerms()">Akzeptieren</button>
        </div>
    </div>

    <script>
        function acceptTerms() {
            document.getElementById('termsOverlay').style.display = 'none';
            document.cookie = "acceptedTerms=true; path=/; max-age=" + (60 * 60 * 24 * 365); // 1 year expiry   
            //Pop-up will show always after Reload Page or closing Browser (Line 304 following have the rest of this code)
        }
    
        window.onload = function() {
            document.body.style.overflow = 'hidden';
    
            // Check if the cookie exists
            if (document.cookie.split('; ').some(row => row.startsWith('acceptedTerms=true'))) {
                document.getElementById('termsOverlay').style.display = 'none';
                document.body.style.overflow = '';
            }
        };
    
        document.getElementById('termsOverlay').addEventListener('transitionend', () => {
            document.body.style.overflow = '';
        });
    </script>
    <header>
        <!-- Popup Menu Icon -->
        <div class="popup-icon" onclick="togglePopupMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </div>
        <button class="login-button" id="btn-login">Login</button>
    </header>
    <!-- Popup Menu -->
    <div id="popup-menu" class="popup-menu" style="display: none;">
        <div class="card3">
            <ul class="list">
                <li class="element">
                    <a class="alighnment" href="../authsystem/index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#7e8590" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                            <path d="M3 9.5L12 3l9 6.5"></path>
                            <path d="M9 22V12h6v10"></path>
                            <path d="M3 22h18"></path>
                        </svg>
                        <p class="label">Startseite</p>
                    </a>
                </li>
                <li class="element">
                    <a class="alighnment" id="btn-signup" href="../authsystem/register.php">
                        <svg class="lucide lucide-user-round-plus" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 21a8 8 0 0 1 13.292-6"></path>
                            <circle r="5" cy="8" cx="10"></circle>
                            <path d="M19 16v6"></path>
                            <path d="M22 19h-6"></path>
                        </svg>
                        <p class="label">Mitglied werden</p>
                    </a>
                </li>
                <li class="element">
                    <a class="alighnment" href=" ../authsystem/index.php #services">
                        <svg class="lucide lucide-settings" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                            <circle r="3" cy="12" cx="12"></circle>
                        </svg>
                        <p class="label">Dienste</p>
                    </a>
                </li>
            </ul>
            <div class="separator"></div>
            <ul class="list">
                <li class="element delete">
                    <a class="alighnment" href="../public/about.html">
                        <svg class="lucide lucide-help-circle" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 1 1 5.91 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        <p class="label">Über uns</p>
                    </a>
                </li>
            </ul>
            <div class="separator"></div>
            <ul class="list">
                <li class="element">
                    <a class="alighnment" href="../public/team_access.html">
                        <svg class="lucide lucide-users-round" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 21a8 8 0 0 0-16 0"></path>
                            <circle r="5" cy="8" cx="10"></circle>
                            <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"></path>
                        </svg>
                        <p class="label">Team Zugriff</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--<video class="background-video" autoplay muted loop>
        <source src="Porscheclip2.mp4" type="video/mp4">
        Your browser does not support the video tag. Create with Sora: I would like an inspirational video to advertise a new religion based off of common sense and self optimization. The video should invoke the sence of becoming the best version of yourself whilst lialso living in a society where people help one another. 
    </video>-->
    <img class="background-image" src="../images/images/Indexbackground.jpg" alt="Background Image"><!--Next Sora prompt: Show the person standing on the top of some roch of a mountain to express that he made it to the top of the world and gives the viewer the scense of fullfillment. And: generate a small logo of this man for this religion-->
    <div class="overlay" style="background-color:rgba(255, 255, 255, 0.34); ">
        <section id="home">
            <h1 style="font-size: 4rem; font-weight: 600; color: #000; ">Egoinfinitura</h1>
            <p style="font-size: 2rem; font-weight: 400; color: #000; ">Gestalte heute das Fundament für Dein zukünftiges Selbst.</p>
        </section>
    </div>
    <main>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Bewusst in die Zukunft</h1>
            </div>
            <div class="container1">
                <h3> Eine auf die Zukunft ausgerichtete Religion. Das ist Egoinfinitura, eine ganz neue Religion, 
                    deren wichtigste Kraft Du selbst bist. Der Name steht für das Selbst (ego), die Unendlichkeit 
                    (infinitas) und die Zukunft (futura). Moderner als das geht es nicht. Unsere Gemeinde 
                    funktioniert komplett online. </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Das zukünftiges Ich im Fokus</h1>
            </div>
            <div class="container1">
                <h3>Du stehst im Mittelpunkt, nicht mit Deinem Ich im Hier und Jetzt, sondern die Person zu der 
                    Du werden willst und wirst: dein zukünftiges Ich. Eine weisere, stärkere und sich immer 
                    weiter entwickelnde Version Deiner Selbst. Werde Dir mit Hilfe von Egoinfinitura bewusst, 
                    wer Dein zukünftiges Ich sein soll und was Du heute dafür tun, sagen und denken kannst. 
                    So kommst Du zu Deinem höheren Selbst.
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Das Buch des Werdens</h1>
            </div>
            <div class="container1">
                <h3> 
                Statt ein heiliges Buch zu lesen, schreibt bei Egoinfinitura jeder Gläubige sein eigenes Buch. 
                Wir nennen es das <b style="color:rgb(130, 130, 130)">Buch des Werdens</b>. Geführt durch unsere Online-Plattform entwickelt 
                es sich während Deines individuellen Wegs des Werdens immer weiter. Damit hälst Du ganz 
                individuell zentrale Erkenntnisse, Gedanken, Ziele und Fortschritte Deines Weges zur 
                besten Version Deiner Selbst fest. Das Buch des Werdens wird zu Deiner wichtigsten 
                Projektionsfläche für Deine Zukunft. 
                </h3>
            </div>
        </section>
        <section class="section-cards">
            <section class="heading-cards">
                <h1>Die Sieben Anhaltspunkte des Werdens</h1>
                <h3>
                    Die Lehre unserer Religion basiert auf den acht Anhaltspunkten des Werdens. Diese 
                    Anhaltspunkte, machen es Dir einfacher, Dich auf Dein zukünftiges Ich auszurichten.
                </h3>
                <p> 
                    Die Anhaltspunkte des Werdens sind keine Regeln, sondern Anhaltspunkte, die Dir helfen sollen, 
                    Dich auf Dein zukünftiges Ich auszurichten. Du entscheidest selbst, wie Du sie 
                    umsetzt.
                <p>
            </section>
            <section class="horizontal-cards">
                <!-- From Uiverse.io by suleymanlaarabidev --> 
                <div class="card2">
                    <div class="first-content">
                       <span>Wachstum</span>
                    </div>
                    <div class="second-content">
                        <span>Nutze Herausforderung und Schwierigkeit als Chance für Wachstum. </span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>Integrität</span>
                    </div>
                    <div class="second-content">
                        <span>Ehrlichkeit und Integrität sind die Verbindung zu Deinem höheren Selbst. </span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>Bedacht</span>
                    </div>
                    <div class="second-content">
                        <span>Jeder Schritt verlangt Bedacht, um zu einer Entwicklung beizutragen.</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>Wandel</span>
                    </div>
                    <div class="second-content">
                     <span>Stillstand hat keinen Platz, Veränderung ist das Ziel.</span>
                    </div>
                </div>
            </section>
            <section class="horizontal-cards">
                <!-- From Uiverse.io by suleymanlaarabidev --> 
                <div class="card2">
                    <div class="first-content">
                       <span>Harmonie</span>
                    </div>
                    <div class="second-content">
                        <span>Vernunft und Emotionen sollen im Einklang sein.</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>Vergebung</span>
                    </div>
                    <div class="second-content">
                        <span>Vergebe Dir selbst. Fehler ermöglichen Dir das Lernen. </span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>Hilfe</span>
                    </div>
                    <div class="second-content">
                        <span>Hilf auch anderen, ihren Weg zu finden. </span>
                    </div>
                </div>
            </section>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Selbstreflektion und Austausch</h1>
            </div>
            <div class="container1">
                <h3> 
                    Einmal im Jahr blicken alle Gläubigen zurück in die vergangene Zeit. Du entscheidest für 
                    Dich, welche Gewohnheiten Dich aufhalten oder weiterbringen. Über Deine Gedanken und 
                    Deinen Fortschritt verfasst Du einen Brief an Dein zukünftiges Ich. In unserem Online-Forum 
                    kannst Du Dich dazu mit anderen Mitgliedern austauschen. 
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Unsterblichkeit</h1>
            </div>
            <div class="container1">
                <h3> 
                    In unserer Religion gibt es nach dem Tod weder Himmel noch Hölle. Dein “Jenseits” ist das, 
                    was du hinterlässt: Gedanken, Taten, Ideen oder Dinge, die in anderen Menschen 
                    weiterleben. Durch positiven Einfluss und gemeinsames Wachstum erreichst Du  
                    Unsterblichkeit. 
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Gemeinschaft und Innovation</h1>
            </div>
            <div class="container1">
                <h3> 
                    Wenn jeder Mensch die beste Version von sich selbst entwickelt, wird auch die gesamte 
                    Gesellschaft besser. Arbeiten und Lernen sind essentielle Lebensaufgaben, nicht nur Mittel 
                    zum Zweck. Wir wollen Herausforderungen innovativ angehen, neue Ideen und Ansätze 
                    entwickeln, die uns Selbst und unsere Mitmenschen weiterbringen. 
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Hilfe</h1>
            </div>
            <div class="container1">
                <h3> 
                    Unsere digitale Gemeinde-Plattform bietet umfassende Unterstützung in allen Fragen. 
                    Persönliche Mentoren und spezialisierte KI-Assistenten sind für Dich da. Auch die anderen 
                    Gemeindemitglieder unterstützen nach Kräften. Eine sich ständig weiterentwickelnde 
                    Gemeinschaft. 
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Entstehung von Egoinfinitura</h1>
            </div>
            <div class="container1">
                <h3> 
                    Religion ist im Wandel. Dafür gibt es verschiedentste Gründe. Wichtige Faktoren sind: der 
                    zunehmende Wohlstand, die Globalisierung und der technologische Wandel. Der Wohlstand 
                    trägt dazu bei, dass mehr Menschen den Fokus auf Selbstoptimierung als auf traditionelle 
                    Glaubenspraktiken legen. Globalisierung und technischer Wandel haben Austausch über 
                    und Hinterfragen der eigenen religiösen Überzeugungen befördert. So ist auch die 
                    Patchwork-Religion enstanden, bei der Menschen Aspekte aus verschiedensten Religionen 
                    aufgreifen und somit eine “neue” Religion für sich selbst entwickeln. Es verbreiten sich neue 
                    spirituelle Einflüsse und Religionen werden individuell optimiert. 
                </h3>
            </div>
        </section>
        <section class="text-section">
            <div class="container1">
                <h3> 
                    Unsere Religion bezieht sich auf zwei wichtige Mega-Trends. Selbstoptimierung und 
                    Individualisierung. Die Religion lässt großen Spielraum für eigene Wünsche, Werte und Ziele 
                    und betont den individuellen Weg zu deren Umsetzung. 
                </h3>
            </div>
        </section>
        <!-- Quote of the Month Section -->
        <section id="quote-of-the-month" style="display: flex; justify-content: center; margin: 40px 0;">
            <div class="quote-container">
                <div class="quote-card">
                    <div class="card-name">Zitat des Monats</div>
                    <div class="quote">
                        <svg fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">Wir sind das, was wir wiederholt tun. Exzellenz ist also keine Handlung, sondern eine Gewohnheit.</div>
                    <div class="author">- Aristoteles <br> <span></span></div>
                </div>
                <div class="quote-card">
                    <div class="card-name">Zitat des Monats</div>
                    <div class="quote">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">Die größte Ehre im Leben liegt nicht darin, niemals zu fallen, sondern jedes Mal wieder aufzustehen.</div>
                    <div class="author">- Nelson Mandela</div>
                </div>
                <div class="quote-card">
                    <div class="card-name">Zitat des Monats</div>
                    <div class="quote">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">Die beste Zeit, einen Baum zu pflanzen, war vor zwanzig Jahren. Die zweitbeste Zeit ist jetzt.</div>
                    <div class="author">- Unbekannt</div>
                </div>
            </div>
        </section>
        <section id="become-member">
            <h1>Werde Teil unserer Gemeinschaft</h1>
            <p>Werde Teil unserer Gemeinschaft und sei Teil von etwas Besonderem. Melde dich jetzt an, um exklusiven Inhalt zu erhalten und dich mit Gleichgesinnten zu vernetzen.</p>
            <p>Wir sind derzeit <span id="member-count"><?php echo ($count) ?></span> Mitglieder stark und wachsen jeden Tag!</p>
            <div>
                <div id="counter-display" class="clock" style="display: flex; gap: 10px; margin-bottom: 20px; padding: 20px; background-color: #ffffff21; border: solid 5px #ffffff; border-radius: 10px">
                    <!-- Digits will be generated dynamically -->
                  </div>
            </div>
        </section>
        <section id="services">
            <h2>Unsere Dienstleistungen</h2>
            <div id="carousel" class="carousel">
                <div class="carousel-items">
                    <div class="carousel-item active">
                        <h2>Profil</h2>
                        <p>Wesentlich: Schreibe, was dein zukünftiges Selbst sein soll</p>
                        <button onclick="window.location.href='../authsystem/profile.php';">Mehr erfahren</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Frage die KI</h2>
                        <p>Brauchst du Hilfe? Dein persönlicher Begleiter ist immer da, um dir in jeder Situation zu helfen.</p>
                        <button onclick="window.location.href='../authsystem/profile.php';">Mehr erfahren</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Jetzt registrieren.</h2>
                        <p>Registriere dich und werde Teil dieser großartigen Religion der Zukunft.</p>
                        <button onclick="window.location.href='../authsystem/register.php'" >Start</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Neue Funktion</h2>
                        <p>Diese Funktion kommt bald. Geduld ist der Schlüssel! Dies ist eine eineinhalb-Mann-Entwickler-Website!</p>
                        <button onclick="window.location.href='../authsystem/profile.php';">Start</button>
                    </div>
                </div>
                <button class="carousel-control prev">❮</button>
                <button class="carousel-control next">❯</button>
            </div>                      
        </section>
    </main>
        <script>
            const counterDisplay = document.getElementById("counter-display");
            const memberCount = <?php echo json_encode($count); ?>; // Fetch the member count from PHP

            function initializeCounter(digits) {
            counterDisplay.innerHTML = "";
            for (let i = 0; i < digits; i++) {
                const digitDiv = document.createElement("div");
                digitDiv.className = "digit";
                digitDiv.id = `digit-${i}`;
                digitDiv.style = `
                position: relative; 
                width: ${60 / digits}vw; 
                height: 20vh; 
                background: #000; 
                border-radius: 5px; 
                overflow: hidden; 
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                font-size: 10vh; 
                font-weight: bold; 
                color: #800020;
                `;
                digitDiv.innerHTML = `<span style="position: absolute; transition: transform 0.5s ease-in-out;">0</span>`;
                counterDisplay.appendChild(digitDiv);
            }
            }

            function updateCounter(value) {
            const countStr = value.toString().padStart(7, "0"); // Ensure 7 digits

            if (countStr.length > counterDisplay.children.length) {
                initializeCounter(countStr.length);
            }

            for (let i = 0; i < countStr.length; i++) {
                updateDigit(`digit-${i}`, countStr[i]);
            }
            }

            function updateDigit(id, newValue) {
            const digitElement = document.getElementById(id);
            const currentValue = digitElement.querySelector("span").textContent;

            if (currentValue !== newValue) {
                digitElement.classList.add("flip");

                setTimeout(() => {
                digitElement.innerHTML = `<span style="position: absolute; transition: transform 0.5s ease-in-out;">${newValue}</span>`;
                digitElement.classList.remove("flip");
                }, 500);
            }
            }

            // Initialize with 7 digits and update with the member count
            initializeCounter(7);
            updateCounter(memberCount);
        </script>
    <footer style="background-color:rgb(13, 13, 13) !important; ">
        <section id="contact">
            <h2>Kontaktieren Sie uns</h2>
            <p>Kontaktieren Sie uns gerne für weitere Informationen.</p>
            <a href="mailto:johann.behling@outlook.com">info@johannbehling.com</a>
        </section>
        <p>&copy; 2025 Egoinfinitura Alle Rechte vorbehalten.</p>
        <ul>
            <li><a href="../public/Impressum.html">Impressum</a></li>
            <li><a href="../public/PrivacyPolicy.html">Datenschutzrichtlinie</a></li>
            <li><a href="../public/TermsandConditions.html">Nutzungsbedingungen</a></li>
        </ul>
    </footer>
    <script src="../public/js/carousel.js"></script>
    <script>
        document.getElementById('btn-login').addEventListener('click', function() {//Zum Login wechseln
            window.location.href = '../authsystem/profile.php';
        });

        function togglePopupMenu() {
            var popupMenu = document.getElementById("popup-menu");
            popupMenu.style.display = popupMenu.style.display === "none" ? "block" : "none";
            popupMenu.classList.toggle("show");
            /*Swal.fire({
                title: 'Information',
                text: 'Das Menü ist aktuell deaktiviert.',
                icon: 'warning',
                background: '#333',
                color: 'white',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true
            });*/
            
        }

        document.getElementById('btn-signup').addEventListener('click', function() {//Zum Signup wechseln
            window.location.href = '../authsystem/register.php';
        });

        function scrollToPosition() {
            let element = document.getElementById("btn-login");
            let offsetTop = element.offsetTop;
            window.scrollTo({ top: offsetTop, behavior: "smooth" });
        }

        function errinerung(){
            Swal.fire({
                allowOutsideClick: false,
                allowEscapeKey: false,
                title: 'Ihre Hilfe ist gefragt!',
                text: 'Werden Sie Mitglied und helfen Sie uns, die Welt zu verändern!',
                icon: 'question',
                theme: 'dark',
                color: 'white',
                position: 'center',
                confirmButtonColor: '#098105',
                cancelButtonColor: '#FF0000',
                showCancelButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Jetzt registrieren',
                cancelButtonText: 'Später',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../authsystem/register.php';
                } else if (result.isDismissed) {
                    Swal.fire({
                        title: 'Kein Problem!',
                        text: 'Wir sind immer bereit, wenn Sie es auch sind!',
                        icon: 'success',
                        theme: 'dark',
                        color: 'white',
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });
        }

        window.addEventListener('load', function () {
            setTimeout(errinerung, 30000);
        });
    </script>
</body>
</html>
<!-- https://github.com/Ninjarock22/Ethik_Project.git -->