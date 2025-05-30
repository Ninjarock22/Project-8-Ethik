<?php
session_start();
require_once "config.php";
//require_once "session.php";

$error = '';
$success = '';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")){
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result();
        if($query->num_rows > 0){
            $error .= 'Diese E-Mail Adresse ist schon registriert.';
        } else {
            if(strlen($password) < 6){
                $error .= 'Passwort muss mindestens 6 Zeichen enthalten.';
            }
            if(empty($confirm_password)){
                $error .= 'Bitte Wiederholen Sie ihr Passwort.';
            } else {
                if(empty($error) && ($password != $confirm_password)){
                    $error .= 'Passwörter stimmen nicht überein.';
                }
            }
            if(empty($error)){
                $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if($result){
                    $success = 'Sie haben den Zugang erfolgreich eingerichtet.';
                    };
                } else {
                    $error .= 'Es ist ein Fehler aufgetreten!';
                }
            }
        }
        $_SESSION['success'] = $success;
        $_SESSION['error'] = $error;
        $query->close();
    }
    if (isset($insertQuery)) {
        $insertQuery->close();
    }
    mysqli_close($db);
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../images/icons/logo3.ico">
        <title>Registrieren</title>
        <link rel="icon" type="image/jpg" href="../images/icon.jpg">
        <!-- <link rel="stylesheet" type="text/css" href="../public/Stylesheet.css" /> -->
        <link rel="stylesheet" type="text/css" href="../public/profilestylesheet.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body class="register-page">
        <header>
            <div class="popup-icon" onclick="togglePopupMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </div>
            <button class="login-button" onclick="window.location.href='profile.php';">Login</button>
        </header>
        <!-- Popup Menu Icon -->
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
                            <p class="label">Startseite</p>
                        </a>
                    </li>
                    <li class="element">
                        <a class="alighnment" href="register.php">
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
                        <a class="alighnment" href="index.php #services">
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
        <main class="main-container">
        <section>    
        <div class="signup-container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="regbody">
                            <form action="" method="post">
                                <div class="form-group">
                                    <h1>Registrieren</h1>
                                </div>
                                <div class="form-group">
                                    <!--<label>Vor- und Zuname</label>-->
                                    <input type="text" name="name" class="form-control" placeholder="Vor- und Nachname" oninvalid="this.setCustomValidity('Bitte geben Sie einen gültigen Namen ein.')" oninput="setCustomValidity('')" required>
                                </div>
                                <div class="form-group">
                                    <!--<label>E-Mail Adresse</label>-->
                                    <input type="email" name="email" class="form-control" placeholder="E-Mail Adresse" oninvalid="this.setCustomValidity('Bitte geben Sie eine gültige E-Mail Adresse ein.')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <!--<label>Passwort</label>-->
                                    <input type="password" name="password" class="form-control" placeholder="Passwort" oninvalid="this.setCustomValidity('Bitte geben Sie ein Passwort ein.')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <!--<label>Passwort wiederholen</label>-->
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Passwort wiederholen" oninvalid="this.setCustomValidity('Bitte wiederholen Sie das Passwort.')" oninput="setCustomValidity('')">
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-group-button">
                                        <input type="submit" name="submit" class="btn-primary" value="Registrieren">
                                        <input type="button" name="submit" class="btn-primary" value="Zurück" id="back">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="form-group-button">
                                        <input type="button" name="submit" class="btn-primary" value="Anmelden" id="tologin">
                                    </div>
                                </div>
                                <br>
                                <?php
                                    if (!empty($error)) {
                                        echo "<script>
                                            Swal.fire({
                                                title: 'Fehler!',
                                                text: '" . addslashes($error) . "',
                                                icon: 'error',
                                                confirmButtonText: 'OK',
                                                background: '#333',
                                                color: 'white',
                                                showConfirmButton: false,
                                                timer: 4000,
                                                showProgressBar: true,
                                                toast: true,
                                                position: 'top-end',
                                            });
                                        </script>";
                                    }else if(!empty($success)){
                                        echo "<script>
                                            Swal.fire({
                                                title: 'Erfolg!',
                                                text: '" . addslashes($success) . "',
                                                icon: 'success',
                                                confirmButtonText: 'OK',
                                                background: '#333',
                                                color: 'white',
                                                showConfirmButton: false,
                                                timer: 4000,
                                                showProgressBar: true,
                                                toast: true,
                                                position: 'top-end',
                                            });
                                            setTimeout(function() {
                                                window.location.href = 'login.php';
                                            }, 4000);
                                        </script>";
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </main>
        <footer>
            <section id="kontakt">
                <h2>Kontaktieren Sie uns</h2>
                <p>Kontaktieren Sie uns gerne für weitere Informationen.</p>
                <a href="mailto:johann.behling@outlook.com">info@johannbehling.com</a>
                <p>&copy; 2025 Egoinfinitura Alle Rechte vorbehalten.</p>
            <ul>
                <li><a href="../public/Impressum.html">Impressum</a></li>
                <li><a href="../public/PrivacyPolicy.html">Datenschutzerklärung</a></li>
                <li><a href="../public/TermsandConditions.html">Nutzungsbedingungen</a></li>
            </ul>
            </section>
        </footer>
    </body>
    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'index.php';
        });
        document.getElementById('tologin').addEventListener('click', function(){
            window.location.href = 'login.php';
        });
        function togglePopupMenu() {
            var popupMenu = document.getElementById("popup-menu");
            popupMenu.style.display = popupMenu.style.display === "none" ? "block" : "none";
            popupMenu.classList.toggle("show");
        }
    </script>
</html>