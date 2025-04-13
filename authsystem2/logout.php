<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../authsystem/stylesheet.css" />
    <title>Logout</title>
    <link rel="icon" type="image/jpg"
		  href="../images/icons/icon.jpg">
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
    }
</style>
<body>
    <div id="logout">
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