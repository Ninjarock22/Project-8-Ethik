<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="icon" type="image/jpg" href="../images/icons/check.png">
</head>
<style>
    #logout {
        overflow: hidden;
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content:center;
        align-items: center;
        color: black;
        text-align: center;
        font-size: 200%;
        font-size: clamp(25px, 1vw, 45px);
        background-image: url("../images/background/skiweltbahn.JPG");
        background-repeat: no-repeat;
        background-size: 100%, auto;
        flex-direction: column;
    }
    body {
        margin: 0;
        padding: 0;
        background-color: #000000;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    h1{
        color: white;
    }
</style>
<body>
    <div id="logout">
        <img src="../images/icons/check.png" alt="Logo" width="200px" height="200px" style="border-radius: 50%;"><br><br>
        <h1>Sie wurden erforlgreich abgemeldet</h1> 
    </div>
    <script>
        sessionStorage.clear();
    </script>
</body>

</html>
<?php
session_start();
if(session_destroy()){
    header("Refresh:1;url=../authsystem/index.php");//Refresh:2;
    exit;
}
?>