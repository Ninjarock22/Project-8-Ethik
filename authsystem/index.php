<?php
//echo "Mitglieder aktuell: " . htmlspecialchars($count);

require_once "config.php";

$stmt = $db->prepare("SELECT COUNT(*) FROM users");
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array();
$count = $row[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo.ico">
    <meta name="description" content="Religion Name - A new religion based on common sense and self-optimization. Join us to become the best version of yourself while living in a supportive community.">
    <meta name="keywords" content="Religion, Self-Optimization, Community, Support, Common Sense">
    <title>Religion Name</title>
    <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../public/Stylesheet.css">
</head>
<body>
    <div class="terms-overlay" id="termsOverlay">
        <div class="terms-box">
            <h2>Terms and Conditions</h2>
            <p>Welcome to this site!</p>
            <p>By using this site, you agree to our terms and conditions. Please read them carefully before proceeding.</p>
            <h3>1. Introduction</h3>
            <p>Welcome to Johann Behling! By accessing or using our website, you agree to be bound by these terms and conditions. If you do not agree with any part of these terms, please do not use our website.</p>
            <!-- Welcome to Johann Behling? Why? What does it mean?-->
            <h3>2. Use of the Website</h3>
            <ul>
                <li>You agree to use the website only for lawful purposes.</li>
                <li>You must not use the website in any way that causes, or may cause, damage or impairment of access.</li>
                <li>You must not engage in any form of harmful conduct or misuse.</li>
            </ul>
    
            <h3>3. Intellectual Property</h3>
            <p>All content, logos, trademarks, and designs on this website are the property of Johann Behling. You may not use, reproduce, or distribute any content without prior written permission.</p>
    
            <h3>4. Limitation of Liability</h3>
            <p>We are not liable for any damages that arise from the use of our website. This includes indirect, incidental, or consequential damages.</p>
    
            <h3>5. Changes to Terms</h3>
            <p>We reserve the right to modify these terms at any time. Continued use of the website constitutes your acceptance of any changes.</p>
    
            <h3>Contact Us</h3>
            <p>If you have any questions about these terms, please contact us at support@johannbehling.com.</p>
            <button class="accept-button" onclick="acceptTerms()">Accept</button>
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
    <div id="popup-menu" class="popup-menu">
        <div class="card3">
            <ul class="list">
                <li class="element">
                    <a class="alighnment" href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#7e8590" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-home">
                            <path d="M3 9.5L12 3l9 6.5"></path>
                            <path d="M9 22V12h6v10"></path>
                            <path d="M3 22h18"></path>
                        </svg>
                        <p class="label">Home</p>
                    </a>
                </li>
                <li class="element">
                    <a class="alighnment" id="btn-signup" href="register.php">
                        <svg class="lucide lucide-user-round-plus" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 21a8 8 0 0 1 13.292-6"></path>
                            <circle r="5" cy="8" cx="10"></circle>
                            <path d="M19 16v6"></path>
                            <path d="M22 19h-6"></path>
                        </svg>
                        <p class="label">Become Member</p>
                    </a>
                </li>
                <li class="element">
                    <a class="alighnment" href=" #services">
                        <svg class="lucide lucide-settings" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="#7e8590" fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                            <circle r="3" cy="12" cx="12"></circle>
                        </svg>
                        <p class="label">Services</p>
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
                        <p class="label">About</p>
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
                        <p class="label">Team Access</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--<video class="background-video" autoplay muted loop>
        <source src="Porscheclip2.mp4" type="video/mp4">
        Your browser does not support the video tag. Create with Sora: I would like an inspirational video to advertise a new religion based off of common sense and self optimization. The video should invoke the sence of becoming the best version of yourself whilst lialso living in a society where people help one another. 
    </video>-->
    <img class="background-image" src="../images/images/Background.png" alt="Background Image"><!--Next Sora prompt: Show the person standing on the top of some roch of a mountain to express that he made it to the top of the world and gives the viewer the scense of fullfillment. And: generate a small logo of this man for this religion-->
    <div class="overlay">
        <section id="home">
            <h1 style="font-size: 4rem; font-weight: 600;">Religion Name</h1>
            <p style="font-size: 2rem; font-weight: 400;">Slogan</p>
        </section>
    </div>
    <main>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Summary here:</h1>
            </div>
            <div class="container1">
                <h3> Lorem ipsum dolor sit amet. Id odit explicabo ut ipsum voluptatem est autem assumenda in sequi nisi et vitae perspiciatis. Aut consequuntur dolores non dolores illo qui necessitatibus tenetur aut quaerat voluptate est quod porro. Qui ratione quia ad corporis magnam At error voluptatem ad sint ducimus qui cumque voluptas. Sed quis praesentium et omnis provident ab voluptatum explicabo qui sunt minima. Non voluptatibus sequi eos consequatur voluptas non earum omnis. Est galisum porro nam necessitatibus voluptatibus nam itaque natus eos deleniti facilis eum molestiae porro. Ea galisum necessitatibus ut sint nobis est autem maiores sed accusantium dicta ad reprehenderit natus ut sapiente alias. Ut eligendi voluptate aut reiciendis ullam ut aliquam animi id omnis eligendi. In vitae explicabo ut nostrum atque est voluptas harum. Non galisum voluptatem et dolorem commodi vel labore nostrum aut alias perferendis sed iste facere.</h3>
            </div>
        </section>
        <section class="text-section">
            <div class="text-section-heading">
                <h1>Explination here:</h1>
            </div>
            <div class="container1">
            <h3> Lorem ipsum dolor sit amet. Id odit explicabo ut ipsum voluptatem est autem assumenda in sequi nisi et vitae perspiciatis. Aut consequuntur dolores non dolores illo qui necessitatibus tenetur aut quaerat voluptate est quod porro. Qui ratione quia ad corporis magnam At error voluptatem ad sint ducimus qui cumque voluptas. Sed quis praesentium et omnis provident ab voluptatum explicabo qui sunt minima. Non voluptatibus sequi eos consequatur voluptas non earum omnis. Est galisum porro nam necessitatibus voluptatibus nam itaque natus eos deleniti facilis eum molestiae porro. Ea galisum necessitatibus ut sint nobis est autem maiores sed accusantium dicta ad reprehenderit natus ut sapiente alias. Ut eligendi voluptate aut reiciendis ullam ut aliquam animi id omnis eligendi. In vitae explicabo ut nostrum atque est voluptas harum. Non galisum voluptatem et dolorem commodi vel labore nostrum aut alias perferendis sed iste facere.</h3>
            </div>
        </section>
        <section class="section-cards">
            <section class="heading-cards">
                <h1>Heading for the "Gebote" here</h1>
            </section>
            <section class="horizontal-cards">
                <!-- From Uiverse.io by suleymanlaarabidev --> 
                <div class="card2">
                    <div class="first-content">
                       <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                     <span>Second</span>
                    </div>
                </div>
            </section>
            <section class="horizontal-cards">
                <!-- From Uiverse.io by suleymanlaarabidev --> 
                <div class="card2">
                    <div class="first-content">
                       <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                        <span>Second</span>
                    </div>
                </div>
                <div class="card2">
                    <div class="first-content">
                        <span>First</span>
                    </div>
                    <div class="second-content">
                     <span>Second</span>
                    </div>
                </div>
            </section>
        </section>
        <!-- Quote of the Month Section -->
        <section id="quote-of-the-month" style="display: flex; justify-content: center; margin: 40px 0;">
            <div class="quote-container">
                <div class="quote-card">
                    <div class="card-name">Quote of the Month</div>
                    <div class="quote">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">Fortune favors the bold.</div>
                    <div class="author">- by Virgil <br> <span>(Latin poet)</span></div>
                </div>
                <div class="quote-card">
                    <div class="card-name">Quote of the Month</div>
                    <div class="quote">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">The only limit is your mind.</div>
                    <div class="author">- by Unknown</div>
                </div>
                <div class="quote-card">
                    <div class="card-name">Quote of the Month</div>
                    <div class="quote">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 330 307" height="80" width="80">
                            <path fill="currentColor" d="M302.258 176.221C320.678 176.221 329.889 185.432 329.889 203.853V278.764C329.889 297.185 320.678 306.395 302.258 306.395H231.031C212.61 306.395 203.399 297.185 203.399 278.764V203.853C203.399 160.871 207.902 123.415 216.908 91.4858C226.323 59.1472 244.539 30.902 271.556 6.75027C280.562 -1.02739 288.135 -2.05076 294.275 3.68014L321.906 29.4692C328.047 35.2001 326.614 42.1591 317.608 50.3461C303.69 62.6266 292.228 80.4334 283.223 103.766C274.626 126.69 270.328 150.842 270.328 176.221H302.258ZM99.629 176.221C118.05 176.221 127.26 185.432 127.26 203.853V278.764C127.26 297.185 118.05 306.395 99.629 306.395H28.402C9.98126 306.395 0.770874 297.185 0.770874 278.764V203.853C0.770874 160.871 5.27373 123.415 14.2794 91.4858C23.6945 59.1472 41.9106 30.902 68.9277 6.75027C77.9335 -1.02739 85.5064 -2.05076 91.6467 3.68014L119.278 29.4692C125.418 35.2001 123.985 42.1591 114.98 50.3461C101.062 62.6266 89.6 80.4334 80.5942 103.766C71.9979 126.69 67.6997 150.842 67.6997 176.221H99.629Z"></path>
                        </svg>
                    </div>
                    <div class="body-text">Dream big, work hard.</div>
                    <div class="author">- by Unknown</div>
                </div>
            </div>
        </section>
        <section id="become-member">
            <h1>Join our community</h1>
            <p>Join our community and be part of something special. Sign up now to access exclusive content and connect with like-minded individuals.</p>
            <p>We are currently <span id="member-count"><?php echo ($count) ?></span> members strong and growing every day!</p>
            <div>
                <div id="counter-display" class="clock" style="display: flex; gap: 10px; margin-bottom: 20px; padding: 20px; background-color: #ffffff21; border: solid 5px #ffffff; border-radius: 10px">
                    <!-- Digits will be generated dynamically -->
                  </div>
            </div>
        </section>
        <section id="services">
            <h2>Our Services</h2>
            <div id="carousel" class="carousel">
                <div class="carousel-items">
                    <div class="carousel-item active">
                        <h2>Profile</h2>
                        <p>Essential: write what your futur self should be</p>
                        <button onclick="window.location.href='profile.php';">Learn more</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Others profiles</h2>
                        <p>See what others are working on/ there futur selves are.</p>
                        <button onclick="window.location.href='profile.php';">Learn more</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Ask AI</h2>
                        <p>Need Help? Your personal Companion is always there to help yo in any situation.</p>
                        <button onclick="window.location.href='profile.php';">Learn more</button>
                    </div>
                    <div class="carousel-item">
                        <h2>Sign up Now.</h2>
                        <p>Sign up and join this awsome religion of the future.</p>
                        <button onclick="window.location.href='register.php'" >Start</button>
                    </div>
                    <div class="carousel-item">
                        <h2>New Feature</h2>
                        <p>This Feature is coming soon. Paciance is key! This is a one and a half man developer Website!</p>
                        <button onclick="window.location.href='profile.php';">Start</button>
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
    <footer>
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Feel free to reach out for more information.</p>
            <a href="mailto:johann.behling@outlook.com">info@johannbehling.com</a>
        </section>
        <p>&copy; 2025 Religion name All rights reserved.</p>
        <ul>
            <li><a href="../public/Impressum.html">Impressum</a></li>
            <li><a href="../public/PrivacyPolicy.html">Privacy Policy</a></li>
            <li><a href="../public/TermsandConditions.html">Terms of Service</a></li>
        </ul>
    </footer>
    <script src="../public/js/carousel.js"></script>
    <script>
        document.getElementById('btn-login').addEventListener('click', function() {//Zum Login wechseln
            window.location.href = 'http://localhost/Project-8-Ethik/authsystem/login.php';
        });

        function togglePopupMenu() {
            Swal.fire({
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
            });
            var popupMenu = document.getElementById("popup-menu");
            popupMenu.classList.toggle("show");
        }

        document.getElementById('btn-signup').addEventListener('click', function() {//Zum Signup wechseln
            window.location.href = 'http://localhost/Project-8-Ethik/authsystem/register.php';
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
                text: 'Werden Sie jetzt Teil von etwas Großem!',
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
                    window.location.href = 'http://localhost/Project-8-Ethik/authsystem/register.php';
                } else if (result.isDismissed) {
                    Swal.fire({
                        title: 'Kein Problem!',
                        text: 'Wir sind immer hier, wenn Sie bereit sind!',
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
            setTimeout(errinerung, 5000);
        });
    </script>
</body>
</html>
<!-- https://github.com/Ninjarock22/Ethik_Project.git -->