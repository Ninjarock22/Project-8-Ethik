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
        header("Location: ../authsystem/login.php");
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
        <title>Register</title>
        <link rel="icon" type="image/jpg" href="../images/icon.jpg">
        <!-- <link rel="stylesheet" type="text/css" href="../css/style.css" /> -->
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .signup-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;

            h2{
                margin-bottom: 20px;
            }
            input{
                width: 90%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 16px;
            }
            button{
                background-color: #5c67f2;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                padding: 10px;
                width: 100%;
            }
            button:hover{
                background-color: #4a54d1;
            }
            .message{
                margin-top: 20px;
                font-size: 14px;
                color: red;
            }
        }
    </style>
    <body>
        <!--header>
            <h1>Registrieren</h1>
        </header>-->
        <div class="signup-container">
            <div class="row">
                <div class="col-md-12">
                    <div id="regbody">
                        <!--<div id="form-group">
                        <h2>Registrieren</h2>
                        <p>Bitte geben Sie ihre Daten zum Erstellen eines Kontos an</p>
                        </div>-->
                        <form action="" method="post">
                            <div class="form-group">
                                <h1>Registrieren</h1>
                            </div>
                            <div class="form-group">
                                <!--<label>Vor- und Zuname</label>-->
                                <input type="text" name="name" class="form-control" placeholder="Vor- und Nachname"  oninvalid="this.setCustomValidity('Bitte einen gültige Namen eingeben')" oninput="setCustomValidity('')"required>
                            </div>
                            <div class="form-group">
                                <!--<label>E-Mail Adresse</label>-->
                                <input type="email" name="email" class="form-control" placeholder="E-Mail" oninvalid="this.setCustomValidity('Bitte eine gültige E-Mail eingeben')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <!--<label>Passwort</label>-->
                                <input type="password" name="password" class="form-control" placeholder="Passwort" oninvalid="this.setCustomValidity('Bitte ein Passwort eingeben')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <!--<label>Passwort wiederholen</label>-->
                                <input type="password" name="confirm_password" class="form-control" placeholder="Passwort wiederholen" oninvalid="this.setCustomValidity('Bitte das Passwort erneut eingeben')" oninput="setCustomValidity('')">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group-button">
                                    <input type="submit" name="submit" class="btn-primary" value="Sign up">
                                    <input type="button" name="submit" class="btn-primary" value="Zurück" id="back">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="form-group-button">
                                    <input type="button" name="submit" class="btn-primary" value="Zum Login" id="tologin">
                                </div>
                            </div>
                            <br>
                            <?php echo isset($success) ? $success : ''; 
                                echo $error; 
                                if($result = $success){   
                                header("Refresh:1; url= ../authsystem/login.php");
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'http://localhost/Project-8-Ethik/public/index.html';
        });
        document.getElementById('tologin').addEventListener('click', function(){
            window.location.href = 'http://localhost/Project-8-Ethik/authsystem/login.php';
        });
    </script>
</html>