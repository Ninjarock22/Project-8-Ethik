<?php
require_once "config.php";
require_once "session.php";
$error = '';
#session_start();

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)) {
        $error .= '<p class="error"> Bitte eine E-Mail angeben</p>';
    }
    if (empty($password)) {
        $error .= '<p class="error"> Bitte Passwort eingeben</p>';
    }
    if(empty($error)){
        if($query = $db->prepare("SELECT * FROM users WHERE email =?")){
            $query->bind_param('s', $email);
            $query->execute();
            $result = $query->get_result();
            $row = $result->fetch_assoc();
            if($row){
                if(password_verify($password, $row['password'])){
                    $_SESSION["userid"] = $row['id'];
                    $_SESSION["user"] = $row['name'];
                    $_SESSION["email"] = $row['email'];
                    header("Location: ../public/profile.html");
                    exit;
                }else{
                    $error .= '<p class="error"> E-Mail oder Kennwort falsch.</p>'; #Falsches Passwort
                }
            }else{
                $error .= '<p class="error"> E-Mail oder Kennwort falsch.</p>'; #Falsche E-Mail
            }
        }
        $query->close();
    }
    mysqli_close($db);
}
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!--<link rel="stylesheet" type="text/css" href="../public/stylesheet.css" />-->
        <link rel="icon" type="image/jpg" href="../images/icons/icon.jpg">
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
        .login-container {
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
        <!--<header>
            <h1>Login</h1>
        </header>-->
        <div class="login-container">
            <form action="" method="post">
                <div class="form-group">
                    <h1>Login</h1>
                </div>
                <div class="form-group">
                    <!-- <label>E-Mail Adresse</label> -->
                    <input type="email" name="email" class="form-control" placeholder="E-Mail" required=""  oninvalid="this.setCustomValidity('Bitte eine gültige E-Mail eingeben')" oninput="setCustomValidity('')"/>
                </div>
                <div class="form-group">
                    <!-- <label>Passwort</label>-->
                    <input type="password" name="password" class="form-control" required="" placeholder="Passwort" oninvalid="this.setCustomValidity('Bitte ein Passwort eingeben')" oninput="setCustomValidity('')" />
                </div>
                <br>
                <div class="form-group">
                    <div class="form-group-button">
                        <input type="submit" name="submit" class="btn-primary" value="Anmelden">
                        <input type="button" name="submit" class="btn-primary" value="Zurück" id="back">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="form-group-button">
                        <input type="button" name="submit" class="btn-primary" value="Passwort zurücksetzen" id="reset">
                    </div>
                </div>
                <br>
                <div id="message">
                    <?php echo $error; ?>   
                </div>
            </form>
        </div>
    <script>
        document.getElementById('back').addEventListener('click', function() {
            window.location.href = 'http://localhost/Project-8-Ethik/public/index.html';
        });
        document.getElementById('reset').addEventListener('click', function(){
            window.location.href = 'http://localhost/Project-8-Ethik/public/reset.html';
        });
    </script>
    </body>
</html>
