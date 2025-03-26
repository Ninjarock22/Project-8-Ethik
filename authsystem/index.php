<?php
require_once "config.php";

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
        <title>Member Count Test</title>
        <!--<link rel="stylesheet" type="text/css" href="../public/stylesheet.css" />-->
        <link rel="icon" type="image/jpg" href="../images/icons/icon.jpg">
    </head>
    <style> 
    </style>
    <body>
    <?php
        echo "Mitglieder aktuell: " . htmlspecialchars($count);
    ?>
    </body>
</html>