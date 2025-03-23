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

<body>
    <!--<div id="logout">
        <h1>Sie wurden erforlgreich abgemeldet</h1> 
    </div>-->
    <script>
        sessionStorage.clear();
    </script>
</body>

</html>
<?php
session_start();
if(session_destroy()){
    header("Refresh:2; url= ../public/index.html");
    exit;
}
?>